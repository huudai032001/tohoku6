<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [Controllers\AuthController::class, 'login'])->name('login');
Route::post('/login', [Controllers\AuthController::class, 'postLogin']);
Route::get('/logout', [Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('web.index');
});
Route::get('/xx', function () {
    return view('admin.test.xx');
});
Route::post('/xx', function () {
    return redirect()->back()->withInput();
});


//spot
Route::get('/list-spot', [App\Http\Controllers\Web\HomeController::class, 'list_spot'])->name('list_spot');
Route::get('/spot-detail/{id}', [App\Http\Controllers\Web\HomeController::class, 'spot_detail'])->name('spot_detail');

// event
Route::get('/list-events', [App\Http\Controllers\Web\HomeController::class, 'list_events'])->name('list_events');
Route::get('/event-detail/{id}', [App\Http\Controllers\Web\HomeController::class, 'event_detail'])->name('event_detail');

// goods
Route::get('/list-goods', [App\Http\Controllers\Web\HomeController::class, 'list_goods'])->name('list_goods');
Route::get('/goods-detail/{id}', [App\Http\Controllers\Web\HomeController::class, 'goods_detail'])->name('goods_detail');


// test email
Route::get('/signin', [App\Http\Controllers\Web\HomeController::class, 'signin'])->name('signin');
Route::post('/signin', [App\Http\Controllers\Web\HomeController::class, 'postSignin'])->name('postSignin');
// Email related routes
Route::get('mail/send', [App\Http\Controllers\MailController::class], 'send_email')->name('postSignin');
//register
Route::get('/register', [App\Http\Controllers\Web\HomeController::class, 'signup'])->name('signup');
Route::post('/register', [App\Http\Controllers\Web\HomeController::class, 'postSignup'])->name('postSignup');

Route::get('/register-edit-profile/{id}', [App\Http\Controllers\Web\HomeController::class, 'edit_profile'])->name('edit_profile');
Route::post('/register-edit-profile/{id}', [App\Http\Controllers\Web\HomeController::class, 'post_edit_profile'])->name('post_edit_profile');

Route::get('/signup-complete', [App\Http\Controllers\Web\HomeController::class, 'signup_complete'])->name('signup_complete');

//login google
Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [App\Http\Controllers\GoogleController::class, 'loginWithGoogle'])->name('google_login');
    Route::get('callback', [App\Http\Controllers\GoogleController::class, 'callbackFromGoogle'])->name('google_callback');
});
//login facebook 
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('login', [App\Http\Controllers\FacebookController::class, 'redirectToFacebook'])->name('facebook_login');
    Route::get('callback', [App\Http\Controllers\FacebookController::class, 'handleFacebookCallback'])->name('facebook_callback');
});


Route::get('/task',[App\Http\Controllers\TaskController::class, 'index'])->name('index');
Route::post('/task', [App\Http\Controllers\TaskController::class, 'store'])->name('task');
// Route::delete('/task/{task}', [App\Http\Controllers\TaskController::class, 'delete'])->name('delete.task');

Route::get('/signup-verify/{id}',[App\Http\Controllers\Web\HomeController::class, 'signup_verify'])->name('signup_verify');
Route::post('/signup-verify/{id}', [App\Http\Controllers\Web\HomeController::class, 'postSignupVerify'])->name('postSignupVerify');