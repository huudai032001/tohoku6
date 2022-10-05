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
use App\Models\ExchangeGoods;

use App\Models\Goods;
use App\Models\User;
use App\Jobs\SendEmail;
use App\Jobs\SendEmailResetPass;

class HandleController extends Controller
{
    public function postExchangeGoods(Request $req,$id){
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
    }
    public function postGoodExchangeConfirm(Request $req){
        $exchange = new ExchangeGoods;
        $exchange->name = $req->input('name');
        $exchange->phone = $req->input('phone');
        $exchange->address = $req->input('address');
        $exchange->home_address = $req->input('home_address');
        $exchange->zip_code = $req->input('zip_code');
        $exchange->furigana = $req->input('furigana');
        $exchange->save();

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

        $this->validate($req,[
            'name'=>'required|min:6|max:50',
            'email'=>'required',
            'location'=>'required',
            'sns'=>'required',
            // 'twitter'=>'required',
            // 'tiktok'=>'required',
            // 'instagram'=>'required',
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
            // 'twitter.required'=>'必須項目です',
            // 'tiktok.required'=>'必須項目です',
            // 'instagram.required'=>'必須項目です',
            'birth_day.required'=>'必須項目です',
            'intro.required'=>'必須項目です',

        ]);
        $uploadService = new \App\Services\UploadService;

        $file = $req->file('image');
        // dd($req->file('image'));
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
        public function postPasswordResetVerify(Request $req,$id){
            $user = User::findorfail($id);
            if($user->otp == $req->input('otp')){
                return redirect("set-new-password/".$user->id);
            }
            else{
                return redirect()->back()->with('thongbao','Mã OTP không chính xác!');
    
            }
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
        public function sortSpot(){
            $sort = $_POST['id'];
            if($sort = 1){
                $list_spot = Spot::orderBy('created_at','DESC')->take(6)->get();
            }elseif($sort = 2){
                $list_spot = Spot::orderBy('favorite','DESC')->take(6)->get();
            }elseif($sort = 3){
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
            $list_event = Event::whereDate('time_start', $date)->take(6)->get();
            foreach($list_event as $value){
                $arr_image [] = ($value->image)->getUrl(); 
            }
            echo json_encode(['arr_image'=>$arr_image,'list_event'=>$list_event]);
    
        }
}