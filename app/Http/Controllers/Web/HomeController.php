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
        
        $list_event = Event::whereDate('created_at', $today->fotmat('Y-m-d'))->take(6)->get();
        $all_event = Event::with('upload')->take(6)->get();

        $list_spot = Spot::take(6)->get();
        $list_upcoming_spot = Event::orderBy('time_start','DESC')->take(12)->get();

        return view('web.index')->with([
            'list_event' => $list_event,
            'list_spot' => $list_spot,
            'list_upcoming_spot' => $list_upcoming_spot,
            'all_event' => $all_event,
        ]);

        return view('web.index',compact('info','list_event','list_spot','list_upcoming_spot','all_event'));
    }
    public function test(){
        return view("web.test");
    }
    public function postIndex(){
        $id = $_POST['year'];

        if($_POST){
            $year = $_POST['year'];
            $month = $_POST['month'];
            $day = $_POST['day'];

            if($month < 10){
                $month = "0" .$month;
            }
            else {
                $month = $month;

            }
            $date = ($year . "-" . $month . "-" . $day);
        }

        $list_event = Event::where('created_at', 'like', '%' . $date . '%')->with('upload')->paginate(6);
        
        echo json_encode($list_event,JSON_UNESCAPED_UNICODE);

    }
    // profile
    public function myProfile(){
        $user = Auth::user();

        $user_spot_posts = Spot::where('author',$info->id)->paginate(6);
        $user_favorite_events = Event::where('author',$info->id)->orderBy('favourite','DESC')->paginate(6);
       
        return view('web.my-profile', compact('list_spot','list_event'));
    }

    public function profileEdit(){
        $user = User::findorfail($id);
        return view('web.profile-edit',compact('user'));
    }
    public function postProfileEdit(Request $req,$id){
        $this->validate($req,[
            'name'=>'required|min:6|max:50',
            'email'=>'required',
            'location'=>'required',
            'sns'=>'required',
            'twitter'=>'required',
            'tiktok'=>'required',
            'instagram'=>'required',
            'birth_day'=>'required',
            'intro'=>'required',

        ],
        [
            'name.required'=>'必須項目です',
            'name.min'=>'パスワードは半角英数字を含む6文字以上を設定してください',
            'name.max'=>'50文字以上入力しないでください',   
            
            'email.required'=>'必須項目です',
            'location.required'=>'必須項目です',
            'sns.required'=>'必須項目です',
            'twitter.required'=>'必須項目です',
            'tiktok.required'=>'必須項目です',
            'instagram.required'=>'必須項目です',
            'birth_day.required'=>'必須項目です',
            'intro.required'=>'必須項目です',

        ]);

        $user = User::findorfail($id);
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->location = $req->input('location');
        $user->sns_active = $req->input('sns');
        $user->twitter_url = $req->input('twitter');
        $user->tiktok_url = $req->input('tiktok');
        $user->instagram_url = $req->input('instagram');

        $user->birth_day = $req->input('birth_day');
        $user->intro = $req->input('intro');
        $user->save();
        return redirect()->back();
    }

    //event

    public function list_events(){
        $get_date = getdate();
        if($get_date['mon'] < 10){
            $mon = "0" .$get_date['mon'];
        }
        else {
            $mon = $get_date['mon'];
        }
        $date = ($get_date['year'] . "-" . $mon . "-" . $get_date['mday']);

        $list_events = Event::where('created_at', 'like', '%' . $date . '%')->paginate(6);
        // $list_events = Event::paginate(6);
        return view('web.events',compact('list_events'));
    }

    public function signup(){
        // $list_events = Event::paginate(6);
        return view('web.signup');
    }

    public function signin(){
        // $list_events = Event::paginate(6);
        return view('web.register');
    }
    // signin edit profile

    public function signup_complete(){
        // $list_events = Event::paginate(6);
        return view('web.signup-complete');
    }

    public function edit_profile($id){
        // $list_events = Event::paginate(6);
        $info_user = User::where('id',$id)->first();
        return view('web.signup-profile-edit',compact('info_user'));
    }

    public function post_edit_profile(Request $req,$id){
        $sv = User::where('id',$id)->first();
        $birth_day = $req->input('day') ."-". $req->input('month') . "-" . $req->input('year');

        $list_user = User::findOrFail($id);
        $list_user->name = $req->input('name');
        $list_user->gender = $req->input('gender');
        $list_user->intro = $req->input('intro');
        $list_user->email = $req->input('email');
        $list_user->location = $req->input('location');
        $list_user->birth_day = $req->input('birth_day');
        $list_user->save();
        // $affected = DB::table('users')
        // ->where('id', $id)
        // ->update(['name' => $req->input('name') , 'gender'=>$req->input('gender'),'intro'=>$req->input('intro'),'email'=>$req->input('email') ,'address'=>$req->input('address') , 'birth_day'=>$birth_day]);

        // return redirect()->back()->with('thanhcong','thay doi thnah cong');
        return redirect()->route('signup_complete');

    }

    public function list_goods(){
        $list_goods = Goods::paginate(6);
        return view('web.goods',compact('list_goods'));
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

    public function goods_detail($id){
        $info_goods = Goods::where('id',$id)->first(); 
        $list_goods = Goods::where('name', 'like', "%info_goods->name%");
        $list_goods->paginate(10);
        // var_dump($list_goods);
        return view('web.good-detail',['info_goods'=>$info_goods,'list_goods'=>$list_goods]);
    }

    // test email 
    public function postSignup(Request $req){
        $check = User::where('email',$req->input('email'))->first();
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
            $checks = User::where('email',$req->input('email'))->first();
            
            return redirect('signup-verify/'. $checks['id']); 
        }
    }
    // signup-verify
    public function signup_verify($id){
        return view('web.signup-verify',compact('id'));
    }
    public function postSignupVerify(Request $req,$id){
        $checks = User::where(['id'=>$id,'otp'=>$req->input('otp')])->first();
        if($checks != null){
            $user = User::findOrFail($id);
            $user->status = 'active';
            $user->save();
            return redirect('register-edit-profile/'.$id);
        }
        else {
            return redirect('signup-verify/'. $id); 

        }
        // return view('web.signup-verify');
    }
    // login
    public function postSignin(Request $req){
        $credentials= ([
            'email'=>$req->input('email'),
            'password'=>($req->input('password'))
        ]);
        // dd(Auth::attempt($credentials));
        if(Auth::attempt($credentials)){
            $check = Auth::user();
            if($check['status'] == 'active'){
                return redirect('index'); 
            }
            else {
                return redirect('signup-verify/'. $check['id']); 
            }
        }
        else{
            return redirect()->back()->with('thongbao','Tài khoản hoặc mật khẩu không chính xác!');

        }
    }
// reset password
    public function passwordReset(){
        return view('web.password-reset');
    }

    public function postPasswordReset(Request $req){

        $check = User::where('email',$req->input('email'))->first();
        $otp = rand(10,100000);
        // var_dump($check);
        // die;
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
        
            return redirect('password-reset-verify/'.$user->id);
        }
        else {
            return redirect()->back()->with('thongbao','Không tìm thấy tài khoản này!');

        }
    }

    public function passwordResetVerify($id){
        return view('web.password-reset-verify',['id'=>$id]);
    }

    public function postPasswordResetVerify(Request $req,$id){
        $user = User::findorfail($id);
        if($user->otp == $req->input('otp')){
            return redirect("set-new-password/".$user->id);
        }
        else{
            return redirect()->back()->with('thongbao','Mã OTP không chính xác!');

        }
    }

    public function passwordResetComplete($id){
        return view('web.password-reset-complete',['id'=>$id]);
    }

    public function setNewPassword($id){
        return view('web.set-new-password',['id'=>$id]);
    }

    public function postPasswordResetComplete(Request $req,$id){
        $user = User::findorfail($id);
        $user->password = bcrypt($req->input('pass_new'));
        $user->save();
        // dd($user->password);
    }
    public function postSetNewPassword(Request $req,$id){
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


        return redirect('password-reset-complete/'.$id)->with('pass_new',$req->input('pass_new'));
    }


    //feature
    public function feature(){

        $list_feature = Event::orderBy('favorite','DESC')
        ->join('uploads', 'uploads.id', '=', 'event.upload_id')->get(['event.*','uploads.file_name']);

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

    public function postfindByCategory(){
        if($_POST){
            $category = $_POST['category'];

            $list_category = Event::with('upload')->where('category',$category)->paginate(6);
            echo json_encode($list_category,JSON_UNESCAPED_UNICODE);

        }
    }

    //favourite
    public function favourite(){
        $id_posts = $_POST['id_posts'];
        $type_posts = $_POST['type_posts'];
        $user_id = $_POST['user_id'];

        $favorite = Favorite::where(['posts_id'=>$id_posts,'type_posts'=>$type_posts])->first();
        // var_dump($id_posts,$type_posts);
        // die;
        $array_user = explode(",",$favorite->user_id);

        if (in_array($user_id, $array_user)) {
            echo json_encode(['res'=>false]);
        }
        else {
            if($favorite->user_id != null){
                $favorite->user_id = $favorite->user_id ."," . $user_id;
            }
            else {
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
            echo json_encode(['res'=>true ,'count'=>$posts->favorite]);
        }
    }
    public function allComment(){
        $id = $_POST['id'];
        $list_comment = Comment::where('spot_id',$id)->orderBy('created_at','DESC')->get();

        echo json_encode($list_comment,JSON_UNESCAPED_UNICODE);

 
    }

}