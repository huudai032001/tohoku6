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
        $file = $req->file('image');
        // dd($req->input('category'));
        $file->move(base_path('\upload'), $file->getClientOriginalName());

        $spot = new Spot();
        $spot->location = $req->input('location');
        $spot->name = $req->input('name');
        $spot->intro = $req->input('intro');
        $spot->image = $file->getClientOriginalName();
        $spot->category = implode(",",$req->input('category'));
        $spot->save();

    }
}