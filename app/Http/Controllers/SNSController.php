<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Jobs\SendEmail;
class SNSController extends Controller
{
    public function loginWithGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function callbackFromGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
            // Check Users Email If Already There

            $is_user = User::where('email', $user['email'])->first();
            if(!$is_user){
                $check_googleId = User::where('google_id',$user['id'])->first();

                if($check_googleId){
                    return redirect()->route('index');
                }
                else{
                    $otp = rand(10,100000);
                    // dd($otp);
                    $saveUser = User::updateOrCreate([
                        'google_id' => $user['id'],
                        // 'otp'=> $otp,

                    ],[
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'otp' => $otp,
                        'password' => Hash::make('12345@tohoku'),
                    ]);

                    $otp = rand(10,100000);
    
                    // $users = $req->input('email');
                    $message = [
                        'type' => 'Create task',
                        'task' => $otp,
                        'content' => 'has been created!',
                    ];
                    // dd($user['email']);
                    SendEmail::dispatch($message, $user['email'])->delay(now()->addMinute(1));
                
                    // dd($saveUser);
                    $get_user = User::where('email', $user['email'])->first();
                    $get_user->otp = $otp;
                    $get_user->save();
                    Auth::loginUsingId($get_user->id);
                    return view('web.signup-verify')->with('id',$get_user->id); 

                }

            }else{
                $saveUser = User::where('email',  $user['email'])->update([
                    'google_id' => $user['id'],
                ]);
                $saveUser = User::where('email', $user['email'])->first();
                Auth::loginUsingId($saveUser->id);
                return redirect()->route('index');
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /// facebook

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            // dd('a');
    
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('email', $user['email'])->first();
     
            if($finduser){

                    Auth::login($finduser);
                    $saveUser = User::where('email',  $user['email'])->update([
                        'facebook_id' => $user['id'],
                    ]);
                    $saveUser = User::where('email', $user['email'])->first();
                    // dd($saveUser->id);
                    Auth::loginUsingId($saveUser->id);
                    return redirect()->route('index');
                    // return redirect('register-edit-profile/'. $saveUser->id);

                
            }else{
            // dd('s');

                $check_facebookId = User::where('facebook_id',$user['id'])->first();
                if($check_facebookId){
                    return redirect()->route('index');
                }
                else {
                    $newUser = User::create([
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'facebook_id'=> $user['id'],
                        'password' => encrypt('12345@tohoku')
                    ]);
                        Auth::login($newUser);
                        $check = Auth::user();
                        return redirect('register-edit-profile');
                }
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
