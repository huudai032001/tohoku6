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
        if(count($list_event) == 0){
            $list_event = Event::orderBy('time_start','DESC')->take(6)->get();
        }
        $all_event = Event::with('upload')->take(6)->get();
        $list_spot = Spot::take(6)->get();
        $list_upcoming_spot = Event::whereDate('time_start','>', $today->format('Y-m-d'))->take(12)->get();
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

}