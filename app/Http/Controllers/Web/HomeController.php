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
        $category = Category::all();
        // dd(Category::getName);
        return view('web.index')->with([
            'list_event' => $list_event,
            'list_spot' => $list_spot,
            'list_upcoming_spot' => $list_upcoming_spot,
            'all_event' => $all_event,
            'list_feature'=> $list_feature,
            'list_goods'=> $list_goods,
            'favorite_spot'=> $favorite_spot,
            'favorite_event'=> $favorite_event,
            'category'=> $category,

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
        // $notifi = Notification::where('user_id',$user->id)->orderBy('created_at','DESC')->take(20)->get();
        return view('web.my-profile', compact(
            'user_spot_posts',
            'user_favorite_events',
            'user',
            'user_comment',
            'user_goods',
            // 'notifi'

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

    public function list_events(){

        $get_date = getdate();
        if($get_date['mon'] < 10){
            $mon = "0" .$get_date['mon'];
        }
        else {
            $mon = $get_date['mon'];
        }
        if($get_date['mday'] < 10) {
            $day = "0" . $get_date['mday'];
        }
        else {
            $day = $get_date['mday'];

        }
        $date = ($get_date['year'] . "-" . $mon . "-" . $day);
        $limit = 1;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else {
            $page = 1;
        }
        $start = ($limit * ($page-1));
        if($start < 0){
            $start = 0;
        }


        if(isset($_GET['area-select'])){
            if(isset($_GET['year'])){
                if($_GET['month'] < 10){
                    $mon = "0" .$_GET['month'];
                }
                else {
                    $mon = $_GET['month'];
                }
                if($_GET['day'] < 10) {
                    $day = "0" . $_GET['day'];
                }
                else {
                    $day = $_GET['day'];
                }
                $date = ($_GET['year'] . "-" . $mon . "-" . $day);
            }

            $location = $_GET['area-select'];
            $list_events = Event::where('location',$location)->whereDate('time_start', $date)->offset($start)->limit($limit)->get();
            $count = count(Event::where('location',$location)->whereDate('time_start', $date)->get());
        }
        else {

            if(isset($_GET['year'])){
                if($_GET['month'] < 10){
                    $mon = "0" .$_GET['month'];
                }
                else {
                    $mon = $_GET['month'];
                }
                if($_GET['day'] < 10) {
                    $day = "0" . $_GET['day'];
                }
                else {
                    $day = $_GET['day'];
                }
                $date = ($_GET['year'] . "-" . $mon . "-" . $day);

                $list_events = Event::whereDate('time_start', $date)->offset($start)->limit($limit)->get();
                $count = count(Event::whereDate('time_start', $date)->get());

            }
            else {
                $list_events = Event::whereDate('time_start', $date)->offset($start)->paginate($limit);
                $count = count(Event::whereDate('time_start', $date)->get());
            }
        }
        $total_page = ceil($count / $limit);
        if($total_page == 0){
            $total_page = 1;
        }
        // dd($start);
        return view('web.events',compact('list_events','total_page','page'));
    }

    public function event_detail($id){
        $info_event = Event::where('id',$id)->first(); 
        $list_event = Event::paginate(6);
        if(Auth::check()){
            $user = Auth::user();
        }
        else {
            $user = [];
        }
        return view('web.event-detail',['info_event'=>$info_event,'list_event'=>$list_event,'user'=>$user]);
    }
    public function list_spot(){
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $sort = $_GET['sort'];
            if($sort == 1){
                $list_spot = Spot::where('spots.name', 'like', '%' . $search . '%')
                ->orderBy('created_at','DESC')
                ->take(6)->get();
            }else if($sort == 2){
                $list_spot = Spot::where('spots.name', 'like', '%' . $search . '%')
                ->orderBy('favorite','DESC')
                ->take(6)->get();
            }
            else if($sort ==3){
                $list_spot = Spot::where('spots.name', 'like', '%' . $search . '%')
                ->orderBy('count_comment','DESC')
                ->take(6)->get();
            }else {
                $list_spot = Spot::where('spots.name', 'like', '%' . $search . '%')
                ->orderBy('created_at','DESC')
                ->take(6)->get();
            }
        }else {
            $list_spot = Spot::with('upload')->orderBy('created_at','DESC')->take(6)->get();

        }
        $category = Category::all();
        // dd($list_spot);
        return view('web.spots',compact('list_spot','category'));
    }
    public function spot_detail($id){
        $list_spot = Spot::take(6)->get();
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

    public function spotEdit($id){
        $info_spot = Spot::findorfail($id);
        if(Auth::check()){
            if($info_spot->author == Auth::user()->id){
                return view('web.spot-edit',compact('info_spot','id'));
            }else {
                return abort(404);
            }
        }else {
            return abort(404);
        }

    }
    
    public function spotRegister(){
        return view('web.spot-register');
    }
}