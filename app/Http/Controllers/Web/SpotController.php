<?php

namespace App\Http\Controllers\Web;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\View;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Spot;
use App\Models\Event;
use App\Models\Upload;
use App\Models\Favorite;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\Category;

use App\Models\Goods;
use App\Models\User;
use App\Jobs\SendEmail;
use App\Jobs\SendEmailResetPass;

class SpotController extends Controller
{
    public function list_spot(Request $req){
        if($req->input('search')){
            $search = $req->input('search');
            $sort = $req->input('sort');
            if($sort == 1){
                $list_spot = Spot::where('spots.name', 'like', '%' . $search . '%')
                ->where('status','active')
                ->orderBy('created_at','DESC')
                ->take(6)->get();
            }else if($sort == 2){
                $list_spot = Spot::where('spots.name', 'like', '%' . $search . '%')
                ->where('status','active')
                ->orderBy('favorite','DESC')
                ->take(6)->get();
            }
            else if($sort ==3){
                $list_spot = Spot::where('spots.name', 'like', '%' . $search . '%')
                ->where('status','active')
                ->orderBy('count_comment','DESC')
                ->take(6)->get();
            }else {
                $list_spot = Spot::where('spots.name', 'like', '%' . $search . '%')
                ->where('status','active')
                ->orderBy('created_at','DESC')
                ->take(6)->get();
            }
        }else {
            $list_spot = Spot::with('upload')->where('status','active')->orderBy('created_at','DESC')->take(6)->get();
        }
        $category = Category::all();
        // dd($list_spot);
        return view('web.spots',compact('list_spot','category'));
    }

    public function spot_detail($alias){
        $list_spot = Spot::take(6)->get();
        $info_spot = Spot::where('alias',$alias)->first();
        // dd($info_spot);
        if ( empty ($info_spot) ) {
            abort (404);
        }
        $recently = Spot::where('location',$info_spot->location)->take(6)->get();
        $list_comment = Comment::where('spot_id',$info_spot->id)->orderBy('created_at','DESC')->limit(5)->get();


        return view('web.spot-detail',['info_spot'=>$info_spot,'list_spot'=>$list_spot,'list_comment'=>$list_comment,'recently'=>$recently]);
    }
    public function spotRegister(){
        return view('web.spot-register');
    }

    public function postSpotRegister(Request $req){
        $this->validate($req,[
            'image'=>'required',
            'sub_image_01'=>'required',
            'sub_image_02'=>'required',
            'sub_image_03'=>'required',

            'location'=>'required',
            'name'=>'required',
            'intro'=>'required',
            'category'=>'required',

        ],
        [
            'image.required'=>'必須項目です',
            'sub_image_01.required'=>'必須項目です',
            'sub_image_02.required'=>'必須項目です',
            'sub_image_03.required'=>'必須項目です',
            'location.required'=>'必須項目です',
            'name.required'=>'必須項目です',
            'intro.required'=>'必須項目です',
            'category.required'=>'必須項目です',

        ]);

        $file = $req->file('image');
        $sub_image_01 = $req->file('sub_image_01');
        $sub_image_02 = $req->file('sub_image_02');
        $sub_image_03 = $req->file('sub_image_03');
        $uploadService = new \App\Services\UploadService;

        $images_01 =  $uploadService->handleUploadFile($sub_image_01,'')['file_info']['id'];
        $images_02 =  $uploadService->handleUploadFile($sub_image_02,'')['file_info']['id'];
        $images_03 =  $uploadService->handleUploadFile($sub_image_03,'')['file_info']['id'];

        $sub_img = "$images_01,$images_02,$images_03";

        $spot = new Spot();
        $spot->location = $req->input('location');
        $spot->name = $req->input('name');
        $spot->intro = $req->input('intro');
        $spot->image_id = $uploadService->handleUploadFile($file,"")['file_info']['id'];
        $spot->sub_image = $sub_img;
        $spot->category = $req->input('category');
        // $spot->save();
        // $spot->category = implode(",",$req->input('category'));

        // dd($req->input('category'));

        return view('web./spot-preview',['spot'=> $spot]);
    }
    public function upload_img(){
        $img = $_FILES['file'];
        $target_dir = "uploads/";
        $target_file   = $target_dir . basename($img["name"]);
        move_uploaded_file($img["tmp_name"], $target_file);
           
    }

    public function PostSpotPreview(Request $req){
        $arr = explode(",",$req->input('sub_image'));
        $example = array("$arr[0]","$arr[1]","$arr[2]");
        $exampleEncoded = json_encode($example);

        // $arr_cate = explode(",",$req->input('category'));
        // $example_cate = array("$arr[0]","$arr[1]","$arr[2]");
        // dd($req->input('category'));
        $user = Auth::user();
        if($req->input('id') == null){
            $spot = new Spot();
            $spot->location = $req->input('location');
            $spot->name = $req->input('name');
            $spot->intro = $req->input('intro');
            $spot->image_id = $req->input('image');
            $spot->images_id = $example;
            $spot->favorite = 0;
            $spot->count_comment = 0;
            $spot->address = $req->input('location');
            $spot->author = $user->id;
            $spot->status = 'disabled';

            $spot->category = $req->input('category');
            $spot->save();

            $favorite = new Favorite();
            $favorite->posts_id = $spot->id;
            $favorite->type_posts = 1;
            $favorite->save();

        }else {
            $spot = Spot::findorfail($req->input('id'));
            $spot->location = $req->input('location');
            $spot->name = $req->input('name');
            $spot->intro = $req->input('intro');
            $spot->image_id = $req->input('image');
            $spot->images_id = $example;
            $spot->author = $user->id;
            $spot->category = $req->input('category');
            $spot->save();
        }
        return view('web.spot-edtting-complete');
    }


    // edit

    public function spotEdit($id){
        $info_spot = Spot::findorfail($id);
            if($info_spot->author == Auth::user()->id){
                return view('web.spot-edit',compact('info_spot','id'));
            }else {
                return abort(404);
            }

    }

    public function postSpotEdit(Request $req,$id){
        $this->validate($req,[

            'location'=>'required',
            'name'=>'required',
            'intro'=>'required',
            'category'=>'required',

        ],
        [
            'image.required'=>'必須項目です',
            'sub_image_01.required'=>'必須項目です',
            'sub_image_02.required'=>'必須項目です',
            'sub_image_03.required'=>'必須項目です',
            'location.required'=>'必須項目です',
            'name.required'=>'必須項目です',
            'intro.required'=>'必須項目です',
            'category.required'=>'必須項目です',

        ]);
        $file = $req->file('image');
        $sub_image_01 = $req->file('sub_image_01');
        $sub_image_02 = $req->file('sub_image_02');
        $sub_image_03 = $req->file('sub_image_03');
        $uploadService = new \App\Services\UploadService;

        $sub_01_hide = $req->input('sub_image_01_hide');
        $sub_02_hide = $req->input('sub_image_02_hide');
        $sub_03_hide = $req->input('sub_image_03_hide');


        
        if($sub_image_01 == null && $sub_image_02 != null && $sub_image_03 != null){
            $images_02 =  $uploadService->handleUploadFile($sub_image_02,'')['file_info']['id'];
            $images_03 =  $uploadService->handleUploadFile($sub_image_03,'')['file_info']['id'];
            $sub_img = "$sub_01_hide,$images_02,$images_03";
        }
        elseif($sub_image_01 == null && $sub_image_02 == null && $sub_image_03 != null){
            $images_03 =  $uploadService->handleUploadFile($sub_image_03,'')['file_info']['id'];
            $sub_img = "$sub_01_hide,$sub_02_hide,$images_03";
        }
        elseif($sub_image_01 == null && $sub_image_02 == null && $sub_image_03 == null){
            $sub_img = "$sub_01_hide,$sub_02_hide,$sub_03_hide";
        }
        elseif($sub_image_01 == null && $sub_image_02 != null && $sub_image_03 == null){
            $images_02 =  $uploadService->handleUploadFile($sub_image_02,'')['file_info']['id'];
            $sub_img = "$sub_01_hide,$images_02,$sub_03_hide";
        }
        elseif($sub_image_01 != null && $sub_image_02 == null && $sub_image_03 != null){
            $images_03 =  $uploadService->handleUploadFile($sub_image_03,'')['file_info']['id'];
            $sub_img = "$images_01,$sub_02_hide,$images_03";
        }
        elseif($sub_image_01 != null && $sub_image_02 == null && $sub_image_03 == null){
            $images_01 =  $uploadService->handleUploadFile($sub_image_01,'')['file_info']['id'];
            $sub_img = "$images_01,$sub_02_hide,$sub_03_hide";
        }
        elseif($sub_image_01 != null && $sub_image_02 != null && $sub_image_03 == null){
            $images_01 =  $uploadService->handleUploadFile($sub_image_01,'')['file_info']['id'];
            $images_02 =  $uploadService->handleUploadFile($sub_image_02,'')['file_info']['id'];
            $sub_img = "$images_01,$images_02,$sub_03_hide";
        }
        else {
            $images_01 =  $uploadService->handleUploadFile($sub_image_01,'')['file_info']['id'];
            $images_02 =  $uploadService->handleUploadFile($sub_image_02,'')['file_info']['id'];
            $images_03 =  $uploadService->handleUploadFile($sub_image_03,'')['file_info']['id'];
            $sub_img = "$images_01,$images_02,$images_03";
        }

        $spot = Spot::findorfail($id);
        $spot->location = $req->input('location');
        $spot->name = $req->input('name');
        $spot->intro = $req->input('intro');
        if($file == null){
            $spot->image_id = $req->input('image_hide');
        }
        else {
            $spot->image_id = $uploadService->handleUploadFile($file,"")['file_info']['id'];
        }
        $spot->sub_image = $sub_img;

        $spot->category = implode(",",$req->input('category'));
        return view('web./spot-preview',['spot'=> $spot]);

    }

    public function spotComment(Request $req){
        $this->validate($req,[
            'comment'=>'required',
        ],
        [
            'comment.required'=>'必須項目です',
        ]);
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->spot_id = $req->input('posts_id');
        $comment->content = $req->input('comment');
        $comment->name_user = $req->input('name_user');

        $comment->save();

        $spot = Spot::where('id',$req->input('posts_id') )->first();
        $spot->count_comment = $spot->count_comment + 1;
        $spot->save();
        return redirect()->back();
    }

    public function deleteComment(){
        $com = Comment::findorfail($_POST['id']);
        $com->delete();
        echo json_encode(['res'=>true]);
    }

    public function postfindByCategorySpot(){
        if($_POST){
            $category = $_POST['category'];
            $arr_image = [];

            $list_category = Spot::where('category','like',"%{$category}%")->take(6)->get();
            // dd($list_category);

            foreach($list_category as $value){
                $arr_image [] = ($value->image)->getUrl(); 
            }
            echo json_encode(['list_category'=>$list_category,'arr_image'=>$arr_image]);
            
        }
    }

}