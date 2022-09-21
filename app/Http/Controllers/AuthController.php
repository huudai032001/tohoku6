<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

use App\Misc\HTML;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'login_id' => ['required'],
            'password' => ['required']
        ]);

        // Check if login using email or login name
        $login_type = \Str::is('*@*.*', $request->input('login_id')) ? 'email' : 'login_name';

        $login_check = Auth::attempt(
                [
                    $login_type => $request->input('login_id'),
                    'password' => $request->input('password')
                ], 
                $request->filled('remember') ? true : false
            );
        
        if ($login_check) {
            
            $request->session()->regenerate();   
                
            if ($request->filled('redirect')) {
                return redirect($request->input('redirect'));
            } else {
                return redirect('/');
            }
            
        }
        
        session()->flash('login_error', __('message.login_failed'));
        return back();
    }

    public function logout (Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login', ['redirect' => $request->input('relogin_redirect')]);
    }
}