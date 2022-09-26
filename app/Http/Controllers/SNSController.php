<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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
                $check_googleId = User::where('google_id',$user['id']);
                if($check_googleId){
                    return redirect()->route('index');
                }
                else{
                    $saveUser = User::updateOrCreate([
                        'google_id' => $user['id'],
                    ],[
                        'login_name' => $user['name'],
                        'email' => $user['email'],
                        'password' => Hash::make('12345@tohoku')
                    ]);
                    $get_user = User::where('email', $user['email'])->first();
                    return redirect('register-edit-profile/'. $get_user['id']);
                }

            }else{
                $saveUser = User::where('email',  $user['email'])->update([
                    'google_id' => $user['id'],
                ]);
                $saveUser = User::where('email', $user['email'])->first();
                return redirect('register-edit-profile/'. $saveUser->id);
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
    
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('email', $user['email'])->first();
            // dd($finduser);
     
            if($finduser){

                    Auth::login($finduser);
                    $saveUser = User::where('email',  $user['email'])->update([
                        'facebook_id' => $user['id'],
                    ]);
                    $saveUser = User::where('email', $user['email'])->first();
                    // dd($saveUser->id);
                    return redirect('register-edit-profile/'. $saveUser->id);

                
            }else{
                $check_facebookId = User::where('facebook_id',$user['id']);
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
                        return redirect('register-edit-profile/'. $check['id']);
                }
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
