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
        $list_spot = Spot::paginate(6);
        return view('web.spots',compact('list_spot'));
    }

    public function spot_detail($id){
  
        $list_spot = Spot::paginate(6);
        $info_spot = Spot::where('id',$id)->first(); 

        // $list_comment = Spot::with('comment')->first();
        $list_comment = Comment::where('spot_id',$id)->orderBy('created_at','DESC')->limit(5)->get();

        // dd($list_comment);
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

        $sub_img = json_encode([$sub_image_01->getClientOriginalName(),$sub_image_02->getClientOriginalName(),$sub_image_03->getClientOriginalName()]);

        $file->move(base_path('\upload'), $file->getClientOriginalName());
        $spot = new Spot();
        $spot->location = $req->input('location');
        $spot->name = $req->input('name');
        $spot->intro = $req->input('intro');
        $spot->image = $file->getClientOriginalName();
        $spot->sub_image = $sub_img;

        $spot->category = implode(",",$req->input('category'));
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
        if($req->input('id') == null){
            $spot = new Spot();
            $spot->location = $req->input('location');
            $spot->name = $req->input('name');
            $spot->intro = $req->input('intro');
            // de tam 1
            // $spot->image_id = $req->input('image');
            $spot->image_id = 1;

            $spot->sub_image = $req->input('sub_image');
            $spot->favorite = 0;
            $spot->address = $req->input('location');
    
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
            $spot->image = $req->input('image');
            $spot->sub_image = $req->input('sub_image');

            $spot->category = $req->input('category');
            $spot->save();
        }


        return redirect('list-spot');

    }


    // edit

    public function spotEdit($id){
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

        if($sub_image_01 == null && $sub_image_02 != null && $sub_image_03 != null){
            $sub_img = json_encode([$req->input('sub_image_01_hide'),$sub_image_02->getClientOriginalName(),$sub_image_03->getClientOriginalName()]);
        }
        elseif($sub_image_01 == null && $sub_image_02 == null && $sub_image_03 != null){
            $sub_img = json_encode([$req->input('sub_image_01_hide'),$req->input('sub_image_02_hide'),$sub_image_03->getClientOriginalName()]);
        }
        elseif($sub_image_01 == null && $sub_image_02 == null && $sub_image_03 == null){
            $sub_img = json_encode([$req->input('sub_image_01_hide'),$req->input('sub_image_02_hide'),$req->input('sub_image_03_hide')]);
        }
        elseif($sub_image_01 == null && $sub_image_02 != null && $sub_image_03 == null){
            $sub_img = json_encode([$req->input('sub_image_01_hide'),$sub_image_02->getClientOriginalName(),$req->input('sub_image_03_hide')]);

        }
        elseif($sub_image_01 != null && $sub_image_02 == null && $sub_image_03 != null){
            $sub_img = json_encode([$sub_image_01->getClientOriginalName(),$req->input('sub_image_02_hide'),$sub_image_03->getClientOriginalName()]);
        }
        elseif($sub_image_01 != null && $sub_image_02 == null && $sub_image_03 == null){
            $sub_img = json_encode([$sub_image_01->getClientOriginalName(),$req->input('sub_image_02_hide'),$req->input('sub_image_03_hide')]);

        }
        elseif($sub_image_01 != null && $sub_image_02 != null && $sub_image_03 == null){
            $sub_img = json_encode([$sub_image_01->getClientOriginalName(),$sub_image_02->getClientOriginalName(),$req->input('sub_image_03_hide')]);

        }
        else {
            $sub_img = json_encode([$sub_image_01->getClientOriginalName(),$sub_image_02->getClientOriginalName(),$sub_image_03->getClientOriginalName()]);
        }

        if($file != null){
            $file->move(base_path('\upload'), $file->getClientOriginalName());
        }
        // var_dump($sub_img);
        // die;
        $spot = Spot::findorfail($id);
        $spot->location = $req->input('location');
        $spot->name = $req->input('name');
        $spot->intro = $req->input('intro');
        if($file == null){
            $spot->image = $req->input('image_hide');
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
        $comment->user_id = $req->input('user_id');
        $comment->spot_id = $req->input('posts_id');
        $comment->content = $req->input('comment');
        $comment->name_user = $req->input('name_user');

        $comment->save();

        $spot = Spot::where($posts_id)->first();
        $spot->count_comment = $spot->count_comment + 1;
        return redirect()->back();
    }

    public function deleteComment(){
        // var_dump('a');
        $com = Comment::findorfail($_POST['id']);
        $com->delete();
        echo json_encode(['res'=>true]);
    }
}