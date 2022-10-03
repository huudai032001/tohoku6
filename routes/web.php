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

// Route::get('/', function () {
//     return view('web.index');
// });
Route::get('/xx', function () {
    return view('admin.test.xx');
});
Route::post('/xx', function () {
    return redirect()->back()->withInput();
});

// non user
// Route::get('/', [App\Http\Controllers\Web\HomeController::class, 'nonUser'])->name('nonUser');

//index
Route::get('/', [App\Http\Controllers\Web\HomeController::class, 'index'])->name('index');
Route::post('/', [App\Http\Controllers\Web\HomeController::class, 'postIndex'])->name('postIndex');
Route::post('/postfindByCategory', [App\Http\Controllers\Web\HomeController::class, 'postfindByCategory'])->name('postfindByCategory');

// profile
Route::get('/my-profile/{id}', [App\Http\Controllers\Web\HomeController::class, 'myProfile'])->name('myProfile');

Route::get('/profile-edit/{id}', [App\Http\Controllers\Web\HomeController::class, 'profileEdit'])->name('profileEdit');
Route::post('/profile-edit/{id}', [App\Http\Controllers\Web\HomeController::class, 'postProfileEdit'])->name('postProfileEdit');


//spot
Route::get('/list-spot', [App\Http\Controllers\Web\SpotController::class, 'list_spot'])->name('list_spot');
Route::get('/spot-detail/{id}', [App\Http\Controllers\Web\SpotController::class, 'spot_detail'])->name('spot_detail');
//comment
Route::post('/spot-comment', [App\Http\Controllers\Web\SpotController::class, 'spotComment'])->name('spotComment');
Route::post('/delete-comment', [App\Http\Controllers\Web\SpotController::class, 'deleteComment'])->name('deleteComment');
Route::post('/all-comment', [App\Http\Controllers\Web\HomeController::class, 'allComment'])->name('allComment');

// like 
Route::post('/favourite', [App\Http\Controllers\Web\HomeController::class, 'favourite'])->name('favourite');

Route::get('/spot-register', [App\Http\Controllers\Web\SpotController::class, 'spotRegister'])->name('spotRegister');
Route::post('/spot-register', [App\Http\Controllers\Web\SpotController::class, 'postSpotRegister'])->name('postSpotRegister');

Route::get('/spot-preview', [App\Http\Controllers\Web\SpotController::class, 'spotEdttingComplete'])->name('spotEdttingComplete');
Route::post('/spot-preview', [App\Http\Controllers\Web\SpotController::class, 'PostSpotPreview'])->name('PostSpotPreview');
// Route::post('/spot-preview-edit/{id}', [App\Http\Controllers\Web\SpotController::class, 'PostSpotPreviewEdit'])->name('PostSpotPreviewEdit');

Route::get('/spot-edit/{id}', [App\Http\Controllers\Web\SpotController::class, 'spotEdit'])->name('spotEdit');
Route::post('/spot-edit/{id}', [App\Http\Controllers\Web\SpotController::class, 'postSpotEdit'])->name('postSpotEdit');


// event
Route::get('/list-events', [App\Http\Controllers\Web\HomeController::class, 'list_events'])->name('list_events');
Route::get('/event-detail/{id}', [App\Http\Controllers\Web\HomeController::class, 'event_detail'])->name('event_detail');

// feature
Route::get('/feature', [App\Http\Controllers\Web\HomeController::class, 'feature'])->name('feature');
Route::get('/feature-detail/{id}', [App\Http\Controllers\Web\HomeController::class, 'featureDetail'])->name('featureDetail');

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
    Route::get('login', [App\Http\Controllers\SNSController::class, 'loginWithGoogle'])->name('google_login');
    Route::get('callback', [App\Http\Controllers\SNSController::class, 'callbackFromGoogle'])->name('google_callback');
});
//login facebook 
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('login', [App\Http\Controllers\SNSController::class, 'redirectToFacebook'])->name('facebook_login');
    Route::get('callback', [App\Http\Controllers\SNSController::class, 'handleFacebookCallback'])->name('facebook_callback');
});


// Route::get('/task',[App\Http\Controllers\TaskController::class, 'index'])->name('index');
// Route::post('/task', [App\Http\Controllers\TaskController::class, 'store'])->name('task');
// Route::delete('/task/{task}', [App\Http\Controllers\TaskController::class, 'delete'])->name('delete.task');

Route::get('/signup-verify/{id}',[App\Http\Controllers\Web\HomeController::class, 'signup_verify'])->name('signup_verify');
Route::post('/signup-verify/{id}', [App\Http\Controllers\Web\HomeController::class, 'postSignupVerify'])->name('postSignupVerify');

//reset password
Route::get('/password-reset',[App\Http\Controllers\Web\HomeController::class, 'passwordReset'])->name('passwordReset');
Route::post('/password-reset',[App\Http\Controllers\Web\HomeController::class, 'postPasswordReset'])->name('postPasswordReset');

Route::get('/password-reset-verify/{id}',[App\Http\Controllers\Web\HomeController::class, 'passwordResetVerify'])->name('passwordResetVerify');
Route::post('/password-reset-verify/{id}',[App\Http\Controllers\Web\HomeController::class, 'postPasswordResetVerify'])->name('postPasswordResetVerify');

Route::get('/password-reset-complete/{id}',[App\Http\Controllers\Web\HomeController::class, 'passwordResetComplete'])->name('passwordResetComplete');
Route::post('/password-reset-complete/{id}',[App\Http\Controllers\Web\HomeController::class, 'postPasswordResetComplete'])->name('postPasswordResetComplete');

Route::get('/set-new-password/{id}',[App\Http\Controllers\Web\HomeController::class, 'setNewPassword'])->name('setNewPassword');
Route::post('/set-new-password/{id}',[App\Http\Controllers\Web\HomeController::class, 'postSetNewPassword'])->name('postSetNewPassword');


Route::post('/upload_img',[App\Http\Controllers\Web\SpotController::class, 'upload_img'])->name('upload_img');
