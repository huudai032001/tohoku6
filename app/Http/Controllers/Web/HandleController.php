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
use App\Models\Category_spot;
use App\Models\Category_event;

use App\Models\Comment;
use App\Models\ExchangeGoods;
use App\Models\ZipCode;
use Illuminate\Support\Str;
use App\Models\Goods;
use App\Models\Report;
use App\Models\EventCategory;
use DB;
use App\Models\Category;

use App\Models\UserNotification;

use App\Models\User;
use App\Jobs\SendEmail;
use App\Jobs\SendEmailResetPass;

class HandleController extends Controller
{
    public function postfindByCategory(Request $req){
        $category = $req->input('category');
        $arr_image = [];

        $list_category = EventCategory::findorfail($req->input('category'))->items;

        foreach($list_category as $value){
            $arr_image [] = ($value->image)->getUrl(); 
        }
        echo json_encode(['list_category'=>$list_category,'arr_image'=>$arr_image]);
        
    }

    public function allComment(Request $req){
        $id = $req->input('id');
        $list_comment = Comment::where('spot_id',$id)->orderBy('created_at','DESC')->get();

        echo json_encode($list_comment,JSON_UNESCAPED_UNICODE);

 
    }
    //favourite

    public function favourite(Request $req){
        $id_posts = $req->input('id_posts');
        $type_posts = $req->input('type_posts');
        $user_id = $req->input('user_id');
        // dd($id_posts);
        $favorite = Favorite::where(['object_id'=>$id_posts,'object_type'=>$type_posts])->first();
        if($favorite){
            $array_user = explode(",",$favorite->user_id);
            if (in_array($user_id, $array_user)) {
                echo json_encode(['res'=>false]);
            }else {
                try{
                    $favorite->user_id = $favorite->user_id ."," . $user_id;

                    $noti = new UserNotification();
                    $noti->user_id = $req->input('user_id');
                    $noti->user_group = User::findorfail($req->input('user_id'))->name;
                    $noti->string = "recently liked post";
                    $noti->params = json_encode(array('order_id'=>$id_posts));
                    $noti->status = "unread";

                    $favorite->save();
                    $noti->save();

                    if($type_posts == 1){
                        $posts = Spot::findorfail($id_posts);
                        $posts->favorite = $posts->favorite + 1;
                        $posts->save();
                    }  
                    else {
                        $posts = Event::findorfail($id_posts);
                        $posts->favorite = $posts->favorite + 1;
                        $posts->save();
                    }
                echo json_encode(['res'=>true ,'count'=>$posts->favorite]);
                DB::commit();
                } catch (\Exception $e) {
                    DB::rollback();
                }
            }
        }else {
            try{
                $favorite = new Favorite();
                $favorite->object_id = $id_posts;
                $favorite->user_id = $user_id;
                $favorite->object_type = $type_posts;
                $favorite->save();

                $noti = new UserNotification();
                $noti->user_id = $req->input('user_id');
                $noti->user_group = User::findorfail($req->input('user_id'))->name;
                $noti->string = "recently liked post";
                $noti->params = json_encode(array('order_id'=>$id_posts));
                $noti->status = "unread";

                $noti->save();
                
                if($type_posts == 1){
                    $posts = Spot::findorfail($id_posts);
                    $posts->favorite = $posts->favorite + 1;
                    $posts->save();
                }  
                else {
                    $posts = Event::findorfail($id_posts);
                    $posts->favorite = $posts->favorite + 1;
                    $posts->save();
                }
            
                echo json_encode(['res'=>true ,'count'=>$posts->favorite]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
            }
        }        
    }
    
        public function sortSpot(Request $req){
            $sort = $req->input('id');

            if($sort == 1){
                $list_spot = Spot::orderBy('created_at','DESC')->take(6)->get();
            }elseif($sort == 2){
                $list_spot = Spot::orderBy('favorite','DESC')->take(6)->get();
            }elseif($sort == 3){
                $list_spot = Spot::orderBy('count_comment','DESC')->take(6)->get();
                
            }else {
                $list_spot = Spot::orderBy('created_at','DESC')->take(6)->get();
            }
            foreach($list_spot as $value){
                $arr_image [] = ($value->image)->getUrl(); 
            }
            echo json_encode(['list_spot'=>$list_spot , 'arr_image'=>$arr_image]);
        }
        public function postIndex(Request $req){

            if($req){
                $year = $req->input('year');
                $month = $req->input('month');
                $day = $req->input('day');
    
                if($month < 10){
                    $month = "0" .$month;
                }
                if($day < 10){
                    $day = "0" .$day;
                }
                $date = ($year . "-" . $month . "-" . $day);
            }
            $arr_image = [];
            $arr_category = [];
            $list_event = Event::whereDate('time_start', $date)->take(6)->get();
            $count = count(Event::whereDate('time_start', $date)->get());
            $total_page = ceil($count / 6);
            if($total_page == 0){
                $total_page = 1;
            }

            foreach($list_event as $value){
                $a = $value->categories;

                foreach($a as $va){
                        $arr_category  []= $va->name; 
                }
                $arr_image [] = ($value->image)->getUrl(); 
            }
            echo json_encode(['arr_image'=>$arr_image,'list_event'=>$list_event,'arr_category'=>$arr_category,'total_page'=>$total_page]);
    
        }
        public function loadMore(Request $req){
            $sort = $req->input('id');
            $count = $req->input('count') + 12;

            if($sort == 1){
                $list_spot = Spot::orderBy('created_at','DESC')->take($count)->get();
            }elseif($sort == 2){
                $list_spot = Spot::orderBy('favorite','DESC')->take($count)->get();
            }elseif($sort == 3){
                $list_spot = Spot::orderBy('count_comment','DESC')->take($count)->get();
                
            }else {
                $list_spot = Spot::orderBy('created_at','DESC')->take($count)->get();
            }
            foreach($list_spot as $value){
                $arr_image [] = ($value->image)->getUrl(); 
            }
            echo json_encode(['list_spot'=>$list_spot , 'arr_image'=>$arr_image]);

        }


        public function loadParamProfile(Request $req){
            $user = Auth::user();
            $sort = $req->input('id');
            $count = $req->input('count') + 12;

            if($sort == 1){
                $list = Spot::where('author',$user->id)->orderBy('created_at','DESC')->take($count)->get();
            }elseif($sort == 2){
                $list = Comment::where('user_id',$user->id)->orderBy('created_at','DESC')->take($count)->get();
            }elseif($sort == 3){
                $list = Spot::where('author',$user->id)->orderBy('favorite','DESC')->take($count)->get();
                
            }else {
                $list = Event::where('author',$user->id)->orderBy('created_at','DESC')->take($count)->get();
            }
            foreach($list as $value){
                $arr_image [] = ($value->image)->getUrl(); 
            }
            echo json_encode(['list'=>$list , 'arr_image'=>$arr_image]);

        }

        function findByZipCode(Request $req){
            $code = $req->input('code');
            // dd($code);
            $zip_code = ZipCode::where('code',$code)->first();
            if($zip_code){
                echo json_encode(['zip_code'=>$zip_code,'res'=>true]);
            }else {
                echo json_encode(['res'=>false]);
            }
            // $arr = array("1","2");
            // $exampleEncoded = json_encode($arr);

            // // dd($arr);
            // $update =  new Spot;
            // $update->category = $arr;
            // $update->save();


        }

        function findByLocation(Request $req){
            $location = $req->input('location');

            $list_spot = Spot::where('location',$location)->orderBy('created_at','DESC')->take(6)->get();
            // dd($list_spot);
            $arr_image = [];
            foreach($list_spot as $value){
                $arr_image [] = ($value->image)->getUrl(); 
            }
            echo json_encode(['list_spot'=>$list_spot,'arr_image'=>$arr_image]);
        }

        function findByLocationEvent(){
            $location = $req->input('location');

            $list_event = Event::where('location',$location)->orderBy('created_at','DESC')->take(6)->get();
            // dd($list_spot);
            $arr_image = [];
            foreach($list_event as $value){
                $arr_image [] = ($value->image)->getUrl(); 
            }
            echo json_encode(['list_event'=>$list_event,'arr_image'=>$arr_image]);
        }







        public function spotComment(Request $req){
            $this->validate($req,[
                'comment'=>'required',
            ],
            [
                'comment.required'=>'必須項目です',
            ]);
            try{

                $comment = new Comment();
                $comment->user_id = Auth::user()->id;
                $comment->spot_id = $req->input('posts_id');
                $comment->content = $req->input('comment');
                $comment->name_user = $req->input('name_user');
                $comment->save();
        
                $spot = Spot::findorfail($req->input('posts_id'));
                $spot->count_comment = $spot->count_comment + 1;
                $spot->save();

                $noti = new UserNotification();
                $noti->user_id = $req->input('author');
                $noti->user_group = User::findorfail($req->input('user_id'))->name;
                $noti->string = "new_comment";
                $noti->params = json_encode(array('order_id'=>$req->input('posts_id')));
                $noti->status = "unread";
                $noti->save();

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



        public function upload_img(){
            $img = $_FILES['file'];
            $target_dir = "uploads/";
            $target_file   = $target_dir . basename($img["name"]);
            move_uploaded_file($img["tmp_name"], $target_file);
               
        }

        public function unFile(Request $req){
            $image_id = $req->input('image');
            $sub_image = explode(',',$req->input('sub_image'));
            $count = count($sub_image);
            for($i = 0;$i< $count;$i++){
                $images = Upload::findorfail($sub_image[$i]);
                unlink('uploads/'.$images->file_name);
                $images->delete();
            }
            $image = Upload::findorfail($image_id);
            unlink('uploads/'.$image->file_name);
            $image->delete();

            echo json_encode(['res'=>true]);
        }

        public function reportComment(Request $req){
            $report = new Report();
            $report->object_id = $req->input('id_com');
            $report->object_type = "comment";
            $report->content = $req->input('report');
            $report->user_id = Auth::user()->id;
            $report->status = "unread";
            $report->save();

            echo json_encode(['res'=>true]);
        }

        public function reportSpot(Request $req){
            $report = new Report();
            $report->object_id = $req->input('id_com');
            $report->object_type = "spot";
            $report->content = $req->input('report');
            $report->user_id = Auth::user()->id;
            $report->status = "unread";
            $report->save();

            echo json_encode(['res'=>true]);
        }
}