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
use App\Models\Goods;
use App\Models\User;
use App\Jobs\SendEmail;
use App\Jobs\SendEmailResetPass;

class HomeController extends Controller
{


    public function list_events(){
        $list_events = Event::paginate(6);
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
        return view('web.event-detail',['info_event'=>$info_event,'list_event'=>$list_event]);
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
        $credentials= (['email'=>$req->input('email'),'password'=>($req->input('password'))]);
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


}