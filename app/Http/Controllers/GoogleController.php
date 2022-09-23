<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
class GoogleController extends Controller
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
            // dd($is_user);
            if(!$is_user){

                $saveUser = User::updateOrCreate([
                    'google_id' => $user['id'],
                ],[
                    'login_name' => $user['name'],
                    'email' => $user['email'],
                    'password' => Hash::make($user['email'])
                ]);
                $get_user = User::where('email', $user['email'])->first();
                return redirect('register-edit-profile/'. $get_user['id']);
                // ->route('edit_profile', $user['id']);
            }else{
                $saveUser = User::where('email',  $user['email'])->update([
                    'google_id' => $user['id'],
                ]);
                $saveUser = User::where('email', $user['email'])->first();
                return redirect()->route('index');

            }


            Auth::loginUsingId($saveUser->id);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
