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
use App\Models\Report_comment;
use App\Models\Report_spot;

use App\Models\Notification;

use App\Models\User;
use App\Jobs\SendEmail;
use App\Jobs\SendEmailResetPass;

class HandleController extends Controller
{
    public function postfindByCategory(Request $req){
        // if($_POST){
            $category = $req->input('category');
            $arr_image = [];

            $list_category = [];
            $category_event = Category_event::where('category_id',$category)->get();
            foreach($category_event as $value){
                $list_category [] = $value->event;
            }

            foreach($list_category as $value){
                $arr_image [] = ($value->image)->getUrl(); 
            }
            echo json_encode(['list_category'=>$list_category,'arr_image'=>$arr_image]);
            
        // }
    }

    public function allComment(){
        $id = $_POST['id'];
        $list_comment = Comment::where('spot_id',$id)->orderBy('created_at','DESC')->get();

        echo json_encode($list_comment,JSON_UNESCAPED_UNICODE);

 
    }
    //favourite

    public function favourite(Request $req){
        $id_posts = $req->input('id_posts');
        $type_posts = $req->input('type_posts');
        $user_id = $req->input('user_id');

        $favorite = Favorite::where(['posts_id'=>$id_posts,'type_posts'=>$type_posts])->first();
        $array_user = explode(",",$favorite->user_id);
        // dd(in_array($user_id, $array_user));
        if (in_array($user_id, $array_user)) {
            echo json_encode(['res'=>false]);
        }
        else {
            try {
                if($favorite->user_id != null){
                    
                    $favorite->user_id = $favorite->user_id ."," . $user_id;
                    // $favorite->user_id = array_pu
                }
                else {
                    $arr_user [] = $user_id;
                    // $favorite->user_id = $arr_user;
                    $favorite->user_id = $user_id;
    
                }
                $favorite->save();
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
    
                // dd($posts->getName());
                $noti = new Notification();
                $noti->user_id = $_POST['user_id'];
                $noti->posts_id = $id_posts;
                $noti->feedback = Auth::user()->name . "が  " . $posts->name ."についての感情を表した";
                $noti->save();
    
                echo json_encode(['res'=>true ,'count'=>$posts->favorite]);
            } catch (\Throwable $th) {
                //throw $th;\
                echo \json_encode(['res'=>false]);
            }
        }
    }
    
        public function sortSpot(){
            $sort = $_POST['id'];

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
        public function postIndex(){

            if($_POST){
                $year = $_POST['year'];
                $month = $_POST['month'];
                $day = $_POST['day'];
    
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
                $a = $value->categoryDetail;

                foreach($a as $va){
                    if($ca = $va->category){
                        $arr_category  []= $ca->name; 
                    }
                }
                $arr_image [] = ($value->image)->getUrl(); 
            }
            // dd($arr_category);
            echo json_encode(['arr_image'=>$arr_image,'list_event'=>$list_event,'arr_category'=>$arr_category,'total_page'=>$total_page]);
    
        }
        public function loadMore(){
            $sort = $_POST['id'];
            $count = $_POST['count'] + 12;

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


        public function loadParamProfile(){
            $user = Auth::user();
            $sort = $_POST['id'];
            $count = $_POST['count'] + 12;

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

        function findByZipCode(){
            $arr = array("1","2");
            $exampleEncoded = json_encode($arr);

            // dd($arr);
            $update =  new Spot;
            $update->category = $arr;
            $update->save();
        }

        function findByLocation(){
            $location = $_POST['location'];

            $list_spot = Spot::where('location',$location)->orderBy('created_at','DESC')->take(6)->get();
            // dd($list_spot);
            $arr_image = [];
            foreach($list_spot as $value){
                $arr_image [] = ($value->image)->getUrl(); 
            }
            echo json_encode(['list_spot'=>$list_spot,'arr_image'=>$arr_image]);
        }

        function findByLocationEvent(){
            $location = $_POST['location'];

            $list_event = Event::where('location',$location)->orderBy('created_at','DESC')->take(6)->get();
            // dd($list_spot);
            $arr_image = [];
            foreach($list_event as $value){
                $arr_image [] = ($value->image)->getUrl(); 
            }
            echo json_encode(['list_event'=>$list_event,'arr_image'=>$arr_image]);
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
            $comment = new Comment();
            $comment->user_id = Auth::user()->id;
            $comment->spot_id = $req->input('posts_id');
            $comment->content = $req->input('comment');
            $comment->name_user = $req->input('name_user');
            $comment->save();
    
            $spot = Spot::findorfail($req->input('posts_id'));
            $spot->count_comment = $spot->count_comment + 1;
            $spot->save();

            $noti = new Notification();
            $noti->user_id = $req->input('author');
            $noti->posts_id = $req->input('posts_id');
            $noti->feedback = Auth::user()->name . "があなたの投稿にコメントしました";
            $noti->save();

            return redirect()->back();
        }

        public function deleteComment(){
            $com = Comment::findorfail($_POST['id']);
            $com->delete();
            echo json_encode(['res'=>true]);
        }



        public function upload_img(){
            $img = $_FILES['file'];
            $target_dir = "uploads/";
            $target_file   = $target_dir . basename($img["name"]);
            move_uploaded_file($img["tmp_name"], $target_file);
               
        }

        public function unFile(){
            $image_id = $_POST['image'];
            $sub_image = explode(',',$_POST['sub_image']);
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
            $report = new Report_comment();
            $report->comment_id = $req->input('id_com');
            $report->content = $req->input('report');
            $report->user_id = Auth::user()->id;
            $report->save();

            echo json_encode(['res'=>true]);
        }

        public function reportSpot(Request $req){
            $report = new Report_spot();
            $report->spot_id = $req->input('id_com');
            $report->content = $req->input('report');
            $report->user_id = Auth::user()->id;
            $report->save();

            echo json_encode(['res'=>true]);
        }
}