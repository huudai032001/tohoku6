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

class HomeController extends Controller
{
    public function list_spot(){
        $list_spot = Spot::paginate(6);
        return view('web.spots',compact('list_spot'));
    }

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

    public function spot_detail($id){
        $info_spot = Spot::where('id',$id)->first(); 
        $list_spot = Spot::paginate(6);
        return view('web.spot-detail',['info_spot'=>$info_spot,'list_spot'=>$list_spot]);
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
        $check = User::where('email',$req->email)->first();
        $otp = rand(10,100);


        $users = $req->email;
        $message = [
            'type' => 'Create task',
            'task' => $otp,
            'content' => 'has been created!',
        ];
        SendEmail::dispatch($message, $users)->delay(now()->addMinute(1));
    
        if($check == null){
            $user = new user();
            $user->email = $req->email;
            $user->password = bcrypt($req->password);
            $user->otp = $otp;
            $user->save();
            $checks = User::where('email',$req->email)->first();
            
            return redirect('signup-verify/'. $checks['id']); 
        }
    }
    // signup-verify
    public function signup_verify($id){
        return view('web.signup-verify',compact('id'));
    }
    public function postSignupVerify(Request $req,$id){
        $checks = User::where(['id'=>$id,'otp'=>$req->otp])->first();
        if($checks != null){
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

            return redirect('index'); 
        }
        else{
            return redirect()->back()->with('thongbao','Tài khoản hoặc mật khẩu không chính xác!');

        }
    }
    // public $successStatus = 200;

    // public function login(Request $request){
    //     // Log::info($request);
    //     if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
    //         return view('home');
    //     }
    //     else{
    //         return Redirect::back ();
    //     }
    // }

    // public function loginWithOtp(Request $request){
    //     // Log::info($request);
    //     $user  = User::where([['email','=',request('email')],['otp','=',request('otp')]])->first();
    //     if($user){
    //         Auth::login($user, true);
    //         User::where('email','=',$request->email)->update(['otp' => null]);
    //         return view('web.signin');
    //     }
    //     else{
    //         return Redirect::back ();
    //     }
    // }

    // public function sendOtp(Request $request){

    //     $otp = rand(1000,9999);
    //     Log::info("otp = ".$otp);
    //     $user = User::where('email','=',$request->email)->update(['otp' => $otp]);
    //     // send otp to email using email api
    //     return response()->json([$user],200);
    // }
}