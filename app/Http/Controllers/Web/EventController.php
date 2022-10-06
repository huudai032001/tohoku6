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

class EventController extends Controller
{

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
        $limit = 2;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else {
            $page = 2;
        }
        $start = ($limit * ($page-1));
        if($start < 0){
            $start = 0;
        }
        $list_events = Event::whereDate('time_start', $date)->offset($start)->paginate($limit);
        $total_page = ceil(count($list_events) / $limit);

        return view('web.events',compact('list_events','total_page'));
    }

    public function event_detail($id){
        // $example = array("1","2","3");

        // $event = new Event();
        // $event->name = '上品な音楽祭';
        // $event->location = 'tokio';
        // $event->intro = '上品な音楽祭';
        // $event->images_id = $example;
        // $event->favorite = 0;
        // $event->count_comment = 0;

        // // var_dump($example);
        // // die;
        // $event->image_id = 1;
        // $event->save();

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
}