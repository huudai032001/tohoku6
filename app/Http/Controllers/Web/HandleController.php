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
    public function postExchangeGoods(Request $req,$alias){
        $this->validate($req,[
            'name'=>'required|max:100',
            'furigana'=>'required|max:100',
            'phone'=>'required|min:10|max:20',
            'zip_code'=>'required|min:6',
            'address'=>'required',
            'home_address'=>'required',
        ],[
            'name.required'=>'必須項目です',
            'name.max'=>'100文字以上入力しないでください', 
            'furigana.required'=>'必須項目です',
            'furigana.max'=>'100文字以上入力しないでください',
            'phone.required'=>'必須項目です',
            'phone.min'=>'パスワードは半角英数字を含む10文字以上を設定してください',
            'phone.max'=>'20文字以上入力しないでください',
            'zip_code.required'=>'必須項目です',
            'zip_code.min'=>'パスワードは半角英数字を含む10文字以上を設定してください',
            'address.required'=>'必須項目です',
            'home_address.required'=>'必須項目です',
        ]);
        // dd($req->input('point_remaining'));
        if($req->input('point_remaining') > 0){

            $exchange = new ExchangeGoods;
            $exchange->name = $req->input('name');
            $exchange->phone = $req->input('phone');
            $exchange->address = $req->input('address');
            $exchange->home_address = $req->input('home_address');
            $exchange->zip_code = $req->input('zip_code');
            $exchange->furigana = $req->input('furigana');

            return view('web.good-exchange-confirm')
            ->with([
                'name_item'=>$req->name_item,
                'image'=> $req->image,
                'point'=> $req->point_remaining,
                'exchange'=>$exchange
            ]);
        }else {
            return redirect()->back()->with('error','あなたのスコアは十分ではありません');
            
        }

    }
    public function postGoodExchangeConfirm(Request $req){
        $alias = Str::slug($req->input('name'), "-");

        $exchange = new ExchangeGoods;
        $exchange->name = $req->input('name');
        $exchange->phone = $req->input('phone');
        $exchange->address = $req->input('address');
        $exchange->home_address = $req->input('home_address');
        $exchange->zip_code = $req->input('zip_code');
        $exchange->furigana = $req->input('furigana');
        $example->alias = $alias;
        $exchange->save();

        $user = Auth::user();
        $user->point = $req->input('point');
        $user->save();

        return redirect('/good-exchange-complete');
    }
    public function postfindByCategory(){
        if($_POST){
            $category = $_POST['category'];
            $arr_image = [];

            $list_category = Event::where('category','like', '%"'. $category .'"%')->take(6)->get();
            dd($list_category);

            foreach($list_category as $value){
                $arr_image [] = ($value->image)->getUrl(); 
            }
            echo json_encode(['list_category'=>$list_category,'arr_image'=>$arr_image]);
            
        }
    }
    public function postProfileEdit(Request $req){
        // dd($req->input('alo'));

        $this->validate($req,[
            'name'=>'required|min:6|max:50',
            'email'=>'required',
            'location'=>'required',
            'birth_day'=>'required',
            'intro'=>'required',

        ],
        [
            'name.required'=>'必須項目です',
            'name.min'=>'パスワードは半角英数字を含む6文字以上を設定してください',
            'name.max'=>'50文字以上入力しないでください',   
            'email.required'=>'必須項目です',
            'location.required'=>'必須項目です',
            'birth_day.required'=>'必須項目です',
            'intro.required'=>'必須項目です',

        ]);
        $uploadService = new \App\Services\UploadService;

        $file = $req->file('image');
        $user = Auth::user();
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->location = $req->input('location');
        $user->sns_active = $req->input('sns');
        $user->twitter_url = $req->input('twitter');
        $user->tiktok_url = $req->input('tiktok');
        $user->instagram_url = $req->input('instagram');
        if($file !=null){
            $user->avatar_image_id = $uploadService->handleUploadFile($file,'')['file_info']['id'];
        }
        $user->birth_day = $req->input('birth_day');
        $user->intro = $req->input('intro');

        $user->save();
        return redirect()->back();
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
    // login
    public function postSignin(Request $req){
        $this->validate($req,[
            'email'=>'required|min:6|max:50',
            'password'=>'required|min:6|max:50',

        ],
        [
            'email.required'=>'必須項目です',
            'email.min'=>'パスワードは半角英数字を含む6文字以上を設定してください',
            'email.max'=>'50文字以上入力しないでください', 
            'password.required'=>'必須項目です',
            'password.min'=>'パスワードは半角英数字を含む6文字以上を設定してください',
            'password.max'=>'50文字以上入力しないでください',  
        ]);
        $credentials= ([
            'email'=>$req->input('email'),
            'password'=>($req->input('password'))
        ]);
        // dd(Auth::attempt($credentials));
        if(Auth::attempt($credentials)){
            $check = Auth::user();
            if($check['status'] == 'active'){
                return redirect('/'); 
            }
            else {
                return view('web.signup-verify')->with(['id'=>$check['id']]); 
            }
        }
        else{
            return redirect()->back()->with('thongbao','アカウントのパスワードが正しくありません!');

        }
    }
        // test email 
        public function postSignup(Request $req){
            $this->validate($req,[
                'email'=>'required|min:6|max:50',
                'password'=>'required|min:6|max:50',
    
            ],
            [
                'email.required'=>'必須項目です',
                'email.min'=>'パスワードは半角英数字を含む6文字以上を設定してください',
                'email.max'=>'50文字以上入力しないでください', 
                'password.required'=>'必須項目です',
                'password.min'=>'パスワードは半角英数字を含む6文字以上を設定してください',
                'password.max'=>'50文字以上入力しないでください',  
            ]);
            $check = User::where('email',$req->input('email'))->first();
            // dd($check);
            $otp = rand(10,100000);
    
            $users = $req->input('email');
            $message = [
                'type' => 'Create task',
                'task' => $otp,
                'content' => 'has been created!',
            ];
            SendEmail::dispatch($message, $users)->delay(now()->addMinute(1));
        
            if($check == null){
                $user = new user();
                $user->email = $req->input('email');
                $user->password = bcrypt($req->input('password'));
                $user->otp = $otp;
                $user->role = 'member';
                $user->save();
                // $checks = User::where('email',$req->input('email'))->first();
                // dd($checks->id);
                return view('web.signup-verify')->with('id',$check->id); 
            }
            else {
                if($check->status == 'disabled'){
                    return view('web.signup-verify')->with('id',$check->id); 
                }
                else {
                    return redirect()->back()->with('error','アカウントはすでに存在しています');
                }

            }
        }
        public function post_edit_profile(Request $req){
            $this->validate($req,[
                'name'=>'required|max:50',
                'gender'=>'required',
                'intro'=>'required',
                'location'=>'required',
                'birth_day'=>'required',

            ],
            [
                'name.required'=> '必須項目です',
                'name.max'=> '50文字以上入力しないでください',

                'gender.required'=> '必須項目です',
                'intro.required'=> '必須項目です',
                'location.required'=> '必須項目です',
                'birth_day.required'=> '必須項目です'

            ]);
            $birth_day = $req->input('day') ."-". $req->input('month') . "-" . $req->input('year');
            $file = $req->file('image');
            $uploadService = new \App\Services\UploadService;

            $list_user = Auth::user();
            $list_user->name = $req->input('name');
            $list_user->gender = $req->input('gender');
            $list_user->intro = $req->input('intro');
            // $list_user->email = $req->input('email');
            // dd($file);
            if($file != null){
                $list_user->avatar_image_id = $uploadService->handleUploadFile($file,"")['file_info']['id'];
            }
            $list_user->location = $req->input('location');
            $list_user->birth_day = $req->input('birth_day');
            $list_user->save();
    
            return redirect()->route('signup_complete');
    
        }
        public function postSignupVerify(Request $req){
            $this->validate($req,[
                'otp'=>'required',

            ],
            [
                'otp.required'=> '必須項目です'
            ]
        );
            $checks = User::where(['id'=>$req->input('id'),'otp'=>$req->input('otp')])->first();
            if($checks != null){
                $user = User::findOrFail($checks->id);
                $user->status = 'active';
                $user->save();
                Auth::loginUsingId($checks->id);

                return redirect('register-edit-profile');
            }
            else {
                $check = User::findorfail($req->input('id'));
                return view('web.signup-verify')->with(['id'=>$check->id,'error'=>'OTP コードが正しくありません']); 
    
            }
        }
        public function postPasswordReset(Request $req){

            $check = User::where('email',$req->input('email'))->first();
            $otp = rand(10,100000);

            if($check){
    
                $message = [
                    'type' => 'Create task',
                    'task' => $otp,
                    'content' => 'has been created!',
                ];
                $user = User::where('email',$req->input('email'))->first();
                $user->otp = $otp;
                $user->save();
                SendEmailResetPass::dispatch($message, $req->input('email'))->delay(now()->addMinute(1));
                // dd($user->id);
                return view('web.password-reset-verify')
                ->with([
                    'user_id'=>$user->id
                ]);
            }
            else {
                return redirect()->back()->with('thongbao','Không tìm thấy tài khoản này!');
    
            }
        }
        public function postPasswordResetVerify(Request $req){
            $user = User::findorfail($req->input('user_id'));
            if($user->otp == $req->input('otp')){
                return view("web.set-new-password")
                ->with([
                    'id'=>$user->id
                ]);
            }
            else{
                return redirect()->back()->with('thongbao','Mã OTP không chính xác!');
    
            }
        }
        public function postPasswordResetComplete(Request $req){
            $user = User::findorfail($req->input('id'));
            $user->password = bcrypt($req->input('pass_new'));
            $user->save();
            dd($user->password);
            return view('web.sns-reset-pass');
        }
        public function postSetNewPassword(Request $req){
            $this->validate($req,[
                'pass_new'=>'required|min:6|max:50',
                're_pass_new'=>'required|same:pass_new|min:6|max:50',
    
            ],
            [
                'pass_new.required'=>'必須項目です',
                'pass_new.min'=>'パスワードは半角英数字を含む6文字以上を設定してください',
                'pass_new.max'=>'50文字以上入力しないでください',   
                
                're_pass_new.required'=>'必須項目です',
                're_pass_new.min'=>'パスワードは半角英数字を含む6文字以上を設定してください',
                're_pass_new.max'=>'50文字以上入力しないでください',   
                're_pass_new.same'=>'互換性のないパスワード',   
    
            ]);
    
    
            return view('web.password-reset-complete')
            ->with([
                'pass_new'=>$req->input('pass_new'),
                'id'=>$req->input('id')
            ]);
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

                $arr_image [] = ($value->image)->getUrl(); 
                $arr_category  []= ($value->getCategory()); 
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
            foreach($list_spot as $value){
                $arr_image [] = ($value->image)->getUrl(); 
            }
            echo json_encode(['list_spot'=>$list_spot,'arr_image'=>$arr_image]);
        }

        public function postfindByCategorySpot(){
            if($_POST){
                $category = $_POST['category'];
                $arr_image = [];
    
                $list_category = Spot::where('category','like',"%{$category}%")->take(6)->get();
                // dd($list_category);
    
                foreach($list_category as $value){
                    $arr_image [] = ($value->image)->getUrl(); 
                }
                echo json_encode(['list_category'=>$list_category,'arr_image'=>$arr_image]);
                
            }
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

        public function postSpotRegister(Request $req){
            
            $this->validate($req,[
                'image'=>'required',
                'location'=>'required',
                'name'=>'required',
                'intro'=>'required',
                'category'=>'required',
    
            ],
            [
                'image.required'=>'必須項目です',
                'location.required'=>'必須項目です',
                'name.required'=>'必須項目です',
                'intro.required'=>'必須項目です',
                'category.required'=>'必須項目です',
    
            ]);
            $alias = Str::slug($req->input('name'), "-");

            $check_name = Spot::where('name',$req->input('name'))->first();
            if($check_name){
                return redirect()->back()->with('error','タイトルは既に存在します');
            }
            $file = $req->file('image');

            $uploadService = new \App\Services\UploadService;
            for($u = 1;$u<3;$u++){
                if($req->file('sub_image_0'. $u)){
                    $sub_img [] = $uploadService->handleUploadFile($req->file('sub_image_0'. $u),'')['file_info']['id'];
                }
            }
            $spot = new Spot();
            $spot->location = $req->input('location');
            $spot->name = $req->input('name');
            $spot->intro = $req->input('intro');
            $spot->image_id = $uploadService->handleUploadFile($file,"")['file_info']['id'];
            $spot->images_id = $sub_img;
            $spot->category = $req->input('category');
            return view('web/spot-preview',['spot'=> $spot]);
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

        public function PostSpotPreview(Request $req){

            $alias = Str::slug($req->input('name'), "-");
            if($req->input('sub_image') == ""){
                $example = array("");
            }
            else {
                $example = explode(",",$req->input('sub_image'));
            }

            $list_cate = explode(",",$req->input('category'));
            $exampleEncoded = json_encode($example);
            $user = Auth::user();
            if($alias == ""){
                $alias = $req->input('name');
            }
            Spot::updateOrInsert([
                'id'=> $req->input('id'),
            ],[
                'location'=> $req->input('location'),
                'address'=> $req->input('location'),
                'name'=> $req->input('name'),
                'intro'=> $req->input('intro'),
                'image_id'=> $req->input('image'),
                'images_id'=> $exampleEncoded,
                'author'=> $user->id,
                'alias'=> $alias,
                'favorite'=> 0,
                'count_comment'=> 0,
                'status'=> 'disabled'
            ]);

            $spot  = Spot::where('alias',$alias)->first();
            Category_spot::where('spot_id',$spot->id)->delete();
            for($i = 0;$i < count($list_cate);$i++){
                Category_spot::updateOrInsert(
                    [
                        'category_id'=>6,
                    ],
                    [
                        'category_id'=>$list_cate[$i],
                        'spot_id'=>$spot->id,
                    ]
                );
            }
            return view('web.spot-edtting-complete');
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