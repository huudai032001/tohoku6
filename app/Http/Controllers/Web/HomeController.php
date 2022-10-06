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

use App\Models\Goods;
use App\Models\User;
use App\Jobs\SendEmail;
use App\Jobs\SendEmailResetPass;

class HomeController extends Controller
{

    public function nonUser(){
        return view('web.non-user');
    }

    public function index(){

        $today = \Carbon\Carbon::now();
        $list_event = Event::whereDate('time_start', $today->format('Y-m-d'))->take(6)->get();
        $all_event = Event::with('upload')->take(6)->get();
        $list_spot = Spot::take(6)->get();
        $list_upcoming_spot = Event::where('location','like', '%tohoku%')->take(12)->get();
        $list_feature = Event::orderBy('created_at','DESC')->take(6)->get();
        $list_goods = Goods::orderBy('created_at','DESC')->take(4)->get();

        $favorite_spot = Spot::orderBy('favorite','DESC')->take(4)->get();
        $favorite_event = Event::orderBy('favorite','DESC')->take(4)->get();

        // dd($list_feature);
        return view('web.index')->with([
            'list_event' => $list_event,
            'list_spot' => $list_spot,
            'list_upcoming_spot' => $list_upcoming_spot,
            'all_event' => $all_event,
            'list_feature'=> $list_feature,
            'list_goods'=> $list_goods,
            'favorite_spot'=> $favorite_spot,
            'favorite_event'=> $favorite_event,

        ]);

    }
    public function test(){
        return view("web.test");
    }

    // profile
    public function myProfile(){
        $user = Auth::user();
        
        $user_spot_posts = Spot::where('author',$user->id)->orderBy('created_at','DESC')->take(6)->get();
        $user_favorite_events = Event::where('author',$user->id)->orderBy('favorite','DESC')->take(6)->get();
        $user_comment = Comment::where('user_id',$user->id)->orderBy('created_at','DESC')->take(4)->get();
        $user_goods = Goods::where('author',$user->id)->orderBy('created_at','DESC')->take(6)->get();

        return view('web.my-profile', compact(
            'user_spot_posts',
            'user_favorite_events',
            'user',
            'user_comment',
            'user_goods'
        ));
    }

    public function profileEdit(){
        $user = Auth::user();
        return view('web.profile-edit',compact('user'));
    }


    //event



    public function signup(){
        // $list_events = Event::paginate(6);
        return view('web.signup');
    }

    public function signin(){
        // $list_events = Event::paginate(6);
        return view('web.signin');
    }
    // signin edit profile

    public function signup_complete(){
        // $list_events = Event::paginate(6);
        return view('web.signup-complete');
    }

    public function edit_profile(){
        // $list_events = Event::paginate(6);
        $info_user = Auth::user();
        return view('web.signup-profile-edit',compact('info_user'));
    }



    public function list_goods(){
        $list_goods = Goods::take(12)->get();
        return view('web.goods',compact('list_goods'));
    }



    public function goods_detail($id){
        $info_goods = Goods::where('id',$id)->first(); 
        $list_goods = Goods::where('name', 'like', "%$info_goods->name%")->take(10)->get();

        return view('web.good-detail',['info_goods'=>$info_goods,'list_goods'=>$list_goods]);
    }

    public function goodExchangeConfirm(){
        return view('web.good-exchange-confirm');
    }

    // signup-verify
    public function signup_verify(){
        return view('web.signup-verify');
    }

    public function exchangeGoods($id){
        $goods = Goods::findorfail($id);
        $user = Auth::user();
        return view('web.good-exchange')
        ->with([
            'id'=>$id,
            'goods'=>$goods,
            'user'=> $user
        ]);
    }

    public function goodExchangeComplete(){
        return view('web.good-exchange-complete');
    }


// reset password
    public function passwordReset(){
        return view('web.password-reset');
    }



    public function passwordResetVerify(){
        return view('web.password-reset-verify');
    }



    public function passwordResetComplete($id){
        return view('web.password-reset-complete',['id'=>$id]);
    }

    public function setNewPassword($id){
        return view('web.set-new-password',['id'=>$id]);
    }
    //feature
    public function feature(){

        $list_feature = Event::orderBy('favorite','DESC')
        ->join('uploads', 'uploads.id', '=', 'event.image_id')->get(['event.*','uploads.file_name']);

        return view('web.features',compact('list_feature'));
    }

    public function featureDetail($id){
        $feature = Event::findorfail($id);
        if(Auth::check()){
            $user = Auth::user();
        }
        else {
            $user = [];
        }
        return view('web.feature-detail',compact('feature','user'));
    }    
}