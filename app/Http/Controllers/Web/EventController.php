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
use App\Models\Category_event;

use App\Models\Goods;
use App\Models\User;
use App\Jobs\SendEmail;
use App\Jobs\SendEmailResetPass;

class EventController extends Controller
{

    public function list_events(Request $req){
        $today = \Carbon\Carbon::now();
        $date = $today->format('Y-m-d');
        $limit = 2;
        if($req->input('page')){
            $page = $req->input('page');
        }else {
            $page = 1;
        }
        $start = ($limit * ($page-1));
        if($start < 0){
            $start = 0;
        }

        if($req->input('area-select')){
            if($req->input('year')){
                if($req->input('month') < 10){
                    $mon = "0" .$req->input('month');
                }
                else {
                    $mon = $req->input('month');
                }
                if($req->input('day') < 10) {
                    $day = "0" . $req->input('day');
                }
                else {
                    $day = $req->input('day');
                }
                $date = ($req->input('year') . "-" . $mon . "-" . $day);
            }

            $location = $req->input('area-select');
            $list_events = Event::where('location',$location)->whereDate('time_start', $date)->offset($start)->limit($limit)->get();
            $count = count(Event::where('location',$location)->whereDate('time_start', $date)->get());
        }
        else {

            if($req->input('year')){
                if($req->input('month') < 10){
                    $mon = "0" .$req->input('month');
                }
                else {
                    $mon = $req->input('month');
                }
                if($req->input('day') < 10) {
                    $day = "0" . $req->input('day');
                }
                else {
                    $day = $req->input('day');
                }
                $date = ($req->input('day') . "-" . $mon . "-" . $day);

                $list_events = Event::whereDate('time_start', $date)->offset($start)->limit($limit)->get();
                $count = count(Event::whereDate('time_start', $date)->get());

            }
            else {
                $list_events = Event::whereDate('time_start', $date)->offset($start)->paginate($limit);
                $count = count(Event::whereDate('time_start', $date)->get());
            }
        }

        if(count($list_events) == 0){
            $list_events = Event::orderBy('time_start', 'DESC')->offset($start)->paginate($limit);
            $count = count(Event::orderBy('time_start', 'DESC')->get());
        }
        $total_page = ceil($count / $limit);
        if($total_page == 0){
            $total_page = 1;
        }
        // dd($start);
        return view('web.events',compact('list_events','total_page','page'));
    }

    public function event_detail($alias){
        $info_event = Event::where('alias',$alias)->first(); 
        if ( empty ($info_event) ) {
            abort (404);
        }
        $recently = Event::where('location',$info_event->location)->take(3)->get();
        // dd($recently);
        $list_event = Event::take(6)->get();
        return view('web.event-detail',[
            'info_event'=>$info_event,
            'list_event'=>$list_event,
            'recently' => $recently
        ]);
    }

    //feature
    public function feature(){

        $list_feature = Event::orderBy('favorite','DESC')
        ->join('uploads', 'uploads.id', '=', 'event.image_id')->get(['event.*','uploads.file_name']);

        return view('web.features',compact('list_feature'));
    }

    public function featureDetail($alias){
        $feature = Event::where('alias',$alias)->first();
        if ( empty ($feature) ) {
            abort (404);
        }
        return view('web.feature-detail',compact('feature'));
    }    
}