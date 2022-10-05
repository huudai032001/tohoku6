<?php

namespace App\Http\Controllers\Web;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\View;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Spot;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\User;

// use App\Jobs\SendEmail;
// use App\Jobs\SendEmailResetPass;

class SpotController extends Controller
{
    public function list_spot(){
        if($_GET){
            $search = $_GET['search'];
            // $list_spot = Spot::paginate(6);
            $list_spot = Spot::where('spots.name', 'like', '%' . $search . '%')
            ->join('uploads', 'uploads.id', '=', 'spots.image_id')
            ->select(['spots.*','uploads.file_name'])
            ->orderBy('created_at','DESC')
            ->take(6)->get();

        }else {
            $list_spot = Spot::with('upload')->paginate(6);

        }
        // dd($list_spot);
        return view('web.spots',compact('list_spot'));
    }

    public function spot_detail($id){
        $list_spot = Spot::paginate(6);
        $info_spot = Spot::where('id',$id)->first(); 
        // dd($list_spot);
        // $list_comment = Spot::with('comment')->first();
        $list_comment = Comment::where('spot_id',$id)->orderBy('created_at','DESC')->limit(5)->get();

        if(Auth::check()){
            $user = Auth::user();
        }
        else {
            $user = [];
        }
        return view('web.spot-detail',['info_spot'=>$info_spot,'list_spot'=>$list_spot,'user'=>$user,'list_comment'=>$list_comment]);
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
        $spot->image = $uploadService->handleUploadFile($file,"")['file_info']['id'];
        $spot->sub_image = $sub_img;
        // $spot->save();

        $spot->category = implode(",",$req->input('category'));
        // dd(($req->file('image')));
        return view('web./spot-preview',['spot'=> $spot]);

        // $spot->save();

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
        $user = Auth::user();
        if($req->input('id') == null){
            $exampleEncoded = json_encode($example);
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
        return redirect('list-spot');
    }


    // edit

    public function spotEdit($id){
        // dd($alias);
        $info_spot = Spot::findorfail($id);
        return view('web.spot-edit',compact('info_spot','id'));
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
        // var_dump($req);
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
        // var_dump('a');
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