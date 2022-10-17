<?php

namespace App\Http\Controllers\Web;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Spot;
use App\Models\Event;
use App\Models\Upload;
use App\Models\Favorite;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\SpotCategory;
use DB;
use Illuminate\Support\Str;
use App\Models\Goods;
use App\Models\User;
use App\Jobs\SendEmail;
use App\Jobs\SendEmailResetPass;

class SpotController extends Controller
{
    public function list_spot(Request $req){
        $query = Spot::where('status','publish');

        if($req->input('search')){
            $query->where('spots.name', 'like', \Helper::makeSearchString());
        }

        switch($req->input('sort')) {
            case 1: 
                $query->orderBy('created_at','DESC');
                break;

            case 2: 
                $query->orderBy('favorite','DESC');
                break;

            case 1: 
                $query->orderBy('count_comment','DESC');
                break;

            default: 
                $query->orderBy('created_at','DESC');
                break;
        }

        $list_spot = $query->take(6)->get();

        $category = SpotCategory::all();
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
        $listLocation = Spot::listLocation();
        return view('web.spot-register')
        ->with([
            'listLocation'=> $listLocation,
        ]);
    }

    public function postSpotRegister(Request $req){
            
        $this->validate($req,[
            'image'=>'required',
            'location'=>'required',
            'name'=>'required',
            'intro'=>'required',
            'category'=>'required',
            'address'=>'required',

        ],
        [
            'address.required'=>'必須項目です',
            'image.required'=>'必須項目です',
            'location.required'=>'必須項目です',
            'name.required'=>'必須項目です',
            'intro.required'=>'必須項目です',
            'category.required'=>'必須項目です',

        ]);
        // dd($req);
        $alias = Str::slug($req->input('name'), "-");

        $check_name = Spot::where('name',$req->input('name'))->first();
        if($check_name){
            return redirect()->back()->with('error','タイトルは既に存在します');
        }
        $file = $req->file('image');
        $sub_img = [];
        $uploadService = new \App\Services\UploadService;
        for($u = 1;$u<3;$u++){
            if($req->file('sub_image_0'. $u)){
                $sub_img [] = $uploadService->handleUploadFile($req->file('sub_image_0'. $u),'')['file_info']['id'];
            }
        }
        $spot = new Spot();
        $spot->location = $req->input('location');
        $spot->address = $req->input('address');
        $spot->name = $req->input('name');
        $spot->intro = $req->input('intro');
        $spot->image_id = $uploadService->handleUploadFile($file,"")['file_info']['id'];
        $spot->images_id = $sub_img;
        $spot->category = $req->input('category');
        $category = $spot->categories;
        return view('web/spot-preview',['spot'=> $spot ,'category'=> $category]);
    }
    public function upload_img(){
        $img = $_FILES['file'];
        $target_dir = "uploads/";
        $target_file   = $target_dir . basename($img["name"]);
        move_uploaded_file($img["tmp_name"], $target_file);
           
    }

    public function PostSpotPreview(Request $req){
        $alias = Str::slug($req->input('name'), "-");
        if($req->input('sub_image') == ""){
            $example = array("");
        }
        else {
            $example = explode(",",$req->input('sub_image'));
        }

        $list_cate = explode(",",$req->input('category'));
        $exampleEncoded = json_encode($example);
        $user = Auth::user();
        if($alias == ""){
            $alias = $req->input('name');
        }
        Spot::updateOrInsert([
            'id'=> $req->input('id'),
        ],[
            'location'=> $req->input('location'),
            'address'=> $req->input('location'),
            'name'=> $req->input('name'),
            'intro'=> $req->input('intro'),
            'image_id'=> $req->input('image'),
            'images_id'=> $exampleEncoded,
            'author'=> $user->id,
            'alias'=> $alias,
            'favorite'=> 0,
            'count_comment'=> 0,
            'status'=> 'disabled',
            'address'=>$req->input('image'),
        ]);

        $spot  = Spot::where('alias',$alias)->first();
        $spot->categories()->sync($list_cate);

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
            'location.required'=>'必須項目です',
            'name.required'=>'必須項目です',
            'intro.required'=>'必須項目です',
            'category.required'=>'必須項目です',

        ]);
        $alias = Str::slug($req->input('name'), "-");

        $check_name = Spot::where('alias',$alias)->where('author','!=',Auth::user()->id)->first();
        if($check_name){
            return redirect()->back()->with('error','タイトルは既に存在します');
        }
        
        $file = $req->file('image');
        $sub_image_01 = $req->file('sub_image_01');
        $sub_image_02 = $req->file('sub_image_02');
        $sub_image_03 = $req->file('sub_image_03');
        $uploadService = new \App\Services\UploadService;

        $spot = Spot::findorfail($id);
        $spot->location = $req->input('location');
        $spot->name = $req->input('name');
        $spot->intro = $req->input('intro');

        $arr_images = $spot->images_id;
        for($u = 1;$u<=3;$u++){

            if($req->file('sub_image_0'. $u) != null){
                $update_img = $uploadService->handleUploadFile($req->file('sub_image_0'. $u),'')['file_info']['id'];
                array_push($arr_images, "$update_img");
            }
        }
        if($file == null){
            $spot->image_id = $req->input('image_hide');
        }
        else {
            $spot->image_id = $uploadService->handleUploadFile($file,"")['file_info']['id'];
        }
        $spot->images_id = $arr_images;
        $spot->category = $req->input('category');
        return view('web./spot-preview',['spot'=> $spot]);

    }

    public function spotComment(Request $req){
        $this->validate($req,[
            'comment'=>'required',
        ],
        [
            'comment.required'=>'必須項目です',
        ]);
        try {
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
            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }
    }

    public function deleteComment(Request $req){
        $com = Comment::findorfail($req->input('id'));
        $com->delete();
        echo json_encode(['res'=>true]);
    }

    public function postfindByCategorySpot(Request $req){
        $arr_image = [];
        $list_category = SpotCategory::findorfail($req->input('category'))->items;
        foreach($list_category as $value){
            $arr_image [] = ($value->image)->getUrl(); 
        }
        echo json_encode(['list_category'=>$list_category,'arr_image'=>$arr_image]);
    }

}