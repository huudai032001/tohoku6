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

Route::get('/logout-user', [App\Http\Controllers\Web\UserController::class, 'logout'])->name('logout');

// non user
Route::get('/test-layout', [App\Http\Controllers\Web\HomeController::class, 'nonUser'])->name('nonUser');

//index
Route::get('/', [App\Http\Controllers\Web\HomeController::class, 'index'])->name('index');
Route::post('/', [App\Http\Controllers\Web\HandleController::class, 'postIndex'])->name('postIndex');
Route::post('/postfindByCategory', [App\Http\Controllers\Web\HandleController::class, 'postfindByCategory'])->name('postfindByCategory');

// profile
Route::middleware(['login_user'])->group(function ()
{
    Route::get('/my-profile', [App\Http\Controllers\Web\UserController::class, 'myProfile'])->name('myProfile');

    Route::get('/profile-edit', [App\Http\Controllers\Web\UserController::class, 'profileEdit'])->name('profileEdit');
    Route::post('/profile-edit', [App\Http\Controllers\Web\UserController::class, 'postProfileEdit'])->name('postProfileEdit');
});


//spot
Route::get('/list-spot', [App\Http\Controllers\Web\SpotController::class, 'list_spot'])->name('list_spot');
Route::get('/spot-detail/{alias}', [App\Http\Controllers\Web\SpotController::class, 'spot_detail'])->name('spot_detail');

Route::post('/postfindByCategorySpot', [App\Http\Controllers\Web\SpotController::class, 'postfindByCategorySpot'])->name('postfindByCategorySpot');
Route::middleware(['login_user'])->group(function ()
{
    Route::get('/spot-edit/{id}', [App\Http\Controllers\Web\SpotController::class, 'spotEdit'])->name('spotEdit');
    Route::post('/spot-edit/{id}', [App\Http\Controllers\Web\HandleController::class, 'postSpotEdit'])->name('postSpotEdit');

    Route::get('/spot-register', [App\Http\Controllers\Web\SpotController::class, 'spotRegister'])->name('spotRegister');
    Route::post('/spot-register', [App\Http\Controllers\Web\SpotController::class, 'postSpotRegister'])->name('postSpotRegister');

    Route::get('/spot-preview', [App\Http\Controllers\Web\SpotController::class, 'spotEdttingComplete'])->name('spotEdttingComplete');
    Route::post('/spot-preview', [App\Http\Controllers\Web\SpotController::class, 'PostSpotPreview'])->name('PostSpotPreview');
});


//comment
Route::post('/spot-comment', [App\Http\Controllers\Web\HandleController::class, 'spotComment'])->name('spotComment');
Route::post('/delete-comment', [App\Http\Controllers\Web\HandleController::class, 'deleteComment'])->name('deleteComment');
Route::post('/all-comment', [App\Http\Controllers\Web\HandleController::class, 'allComment'])->name('allComment');

// like 
Route::post('/favourite', [App\Http\Controllers\Web\HandleController::class, 'favourite'])->name('favourite');

// event
Route::get('/list-events', [App\Http\Controllers\Web\EventController::class, 'list_events'])->name('list_events');
Route::get('/event-detail/{alias}', [App\Http\Controllers\Web\EventController::class, 'event_detail'])->name('event_detail');

// feature
Route::get('/feature', [App\Http\Controllers\Web\EventController::class, 'feature'])->name('feature');
Route::get('/feature-detail/{alias}', [App\Http\Controllers\Web\EventController::class, 'featureDetail'])->name('featureDetail');

// goods
Route::get('/list-goods', [App\Http\Controllers\Web\GoodsController::class, 'list_goods'])->name('list_goods');
Route::get('/goods-detail/{alias}', [App\Http\Controllers\Web\GoodsController::class, 'goods_detail'])->name('goods_detail');
Route::middleware(['login_user'])->group(function ()
{
Route::get('/exchange-goods/{alias}', [App\Http\Controllers\Web\GoodsController::class, 'exchangeGoods'])->name('exchangeGoods');
Route::post('/exchange-goods/{alias}', [App\Http\Controllers\Web\GoodsController::class, 'postExchangeGoods'])->name('postExchangeGoods');
});
Route::get('/good-exchange-confirm', [App\Http\Controllers\Web\GoodsController::class, 'goodExchangeConfirm'])->name('goodExchangeConfirm');
Route::post('/good-exchange-confirm', [App\Http\Controllers\Web\GoodsController::class, 'postGoodExchangeConfirm'])->name('postGoodExchangeConfirm');

Route::get('/good-exchange-complete', [App\Http\Controllers\Web\GoodsController::class, 'goodExchangeComplete'])->name('goodExchangeComplete');

// test email
Route::get('/signin', [App\Http\Controllers\Web\UserController::class, 'signin'])->name('signin');
Route::post('/signin', [App\Http\Controllers\Web\UserController::class, 'postSignin'])->name('postSignin');
// Email related routes
Route::get('mail/send', [App\Http\Controllers\MailController::class], 'send_email')->name('postSignin');
//register
Route::get('/register', [App\Http\Controllers\Web\UserController::class, 'signup'])->name('signup');
Route::post('/register', [App\Http\Controllers\Web\UserController::class, 'postSignup'])->name('postSignup');

Route::get('/register-edit-profile', [App\Http\Controllers\Web\UserController::class, 'edit_profile'])->name('edit_profile');
Route::post('/register-edit-profile', [App\Http\Controllers\Web\UserController::class, 'post_edit_profile'])->name('post_edit_profile');

Route::get('/signup-complete', [App\Http\Controllers\Web\UserController::class, 'signup_complete'])->name('signup_complete');

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

Route::get('/signup-verify',[App\Http\Controllers\Web\UserController::class, 'signup_verify'])->name('signup_verify');
Route::post('/signup-verify', [App\Http\Controllers\Web\UserController::class, 'postSignupVerify'])->name('postSignupVerify');

//reset password
Route::get('/password-reset',[App\Http\Controllers\Web\UserController::class, 'passwordReset'])->name('passwordReset');
Route::post('/password-reset',[App\Http\Controllers\Web\UserController::class, 'postPasswordReset'])->name('postPasswordReset');

Route::get('/password-reset-verify',[App\Http\Controllers\Web\UserController::class, 'passwordResetVerify'])->name('passwordResetVerify');
Route::post('/password-reset-verify',[App\Http\Controllers\Web\UserController::class, 'postPasswordResetVerify'])->name('postPasswordResetVerify');

Route::get('/password-reset-complete',[App\Http\Controllers\Web\UserController::class, 'passwordResetComplete'])->name('passwordResetComplete');
Route::post('/password-reset-complete',[App\Http\Controllers\Web\UserController::class, 'postPasswordResetComplete'])->name('postPasswordResetComplete');

Route::get('/set-new-password',[App\Http\Controllers\Web\UserController::class, 'setNewPassword'])->name('setNewPassword');
Route::post('/set-new-password',[App\Http\Controllers\Web\UserController::class, 'postSetNewPassword'])->name('postSetNewPassword');


Route::post('/upload_img',[App\Http\Controllers\Web\HandleController::class, 'upload_img'])->name('upload_img');
Route::post('/sort_spot',[App\Http\Controllers\Web\HandleController::class, 'sortSpot'])->name('sortSpot');
Route::post('/load_more_spot',[App\Http\Controllers\Web\HandleController::class, 'loadMore'])->name('loadMore');
Route::post('/load_param_profile',[App\Http\Controllers\Web\HandleController::class, 'loadParamProfile'])->name('loadParamProfile');
Route::get('/find_by_zip_code',[App\Http\Controllers\Web\HandleController::class, 'findByZipCode'])->name('findByZipCode');
Route::post('/find_by_location',[App\Http\Controllers\Web\HandleController::class, 'findByLocation'])->name('findByLocation');
Route::post('/find_by_location_event',[App\Http\Controllers\Web\HandleController::class, 'findByLocationEvent'])->name('findByLocationEvent');

Route::post('/un_file',[App\Http\Controllers\Web\HandleController::class, 'unFile'])->name('unFile');

Route::post('/report-comment',[App\Http\Controllers\Web\HandleController::class, 'reportComment'])->name('reportComment');
Route::post('/report-spot',[App\Http\Controllers\Web\HandleController::class, 'reportSpot'])->name('reportSpot');


