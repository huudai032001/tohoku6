<?php

namespace App\Http\Controllers\Web;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\View;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Spot;
// use App\Models\Event;
// use App\Models\Goods;
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
        $info_spot = Spot::where('id',$id)->first(); 
        $list_spot = Spot::paginate(6);
        return view('web.spot-detail',['info_spot'=>$info_spot,'list_spot'=>$list_spot]);
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
        $target_dir = "upload/";
        $target_file   = $target_dir . basename($img["name"]);
        move_uploaded_file($img["tmp_name"], $target_file);
           
    }

    public function PostSpotPreview(Request $req){
        $spot = new Spot();
        $spot->location = $req->input('location');
        $spot->name = $req->input('name');
        $spot->intro = $req->input('intro');
        $spot->image = $req->input('image');
        $spot->sub_image = $req->input('sub_image');

        $spot->category = $req->input('category');
        $spot->save();

        // return view('web.spot-edtting-complete',['spot'=> $spot]);

    }

    // edit

    public function spotEdit($id){
        $info_spot = Spot::findorfail($id);
        return view('web.spot-edit',compact('info_spot'));
    }

    public function postSpotEdit(Request $req,$id){

    }
}