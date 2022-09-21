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
    return view('welcome');
});
Route::get('/xx', function () {
    return view('admin.test.xx');
});
Route::post('/xx', function () {
    return redirect()->back()->withInput();
});