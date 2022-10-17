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
use DB;

use App\Models\Goods;
use App\Models\User;
use App\Jobs\SendEmail;
use App\Jobs\SendEmailResetPass;

class UserController extends Controller
{
    // view
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
            'user_goods',

        ));
    }
    public function profileEdit(){
        $user = Auth::user();
        return view('web.profile-edit',compact('user'));
    }
    public function signin(){
        return view('web.signin');
    }
    
    public function signup(){
        return view('web.signup');
    }
    
    public function signup_complete(){
        return view('web.signup-complete');
    }


    public function edit_profile(){
        $info_user = Auth::user();
        return view('web.signup-profile-edit',compact('info_user'));
    }

    public function signup_verify(){
        return view('web.signup-verify');
    }
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
    // handle

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

    public function postProfileEdit(Request $req){
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


    public function logout (Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->back();
    }
}