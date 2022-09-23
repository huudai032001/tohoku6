<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
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
                    'google_id' => $user['id'],
                ]);
                $saveUser = User::where('email', $user['email'])->first();
                return redirect('/');
     
            }else{
                $newUser = User::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'facebook_id'=> $user['id'],
                    'password' => encrypt($user['email'])
                ]);
    
                    Auth::login($newUser);
                    $check = Auth::user();
                    return redirect('register-edit-profile/'. $check['id']);
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
