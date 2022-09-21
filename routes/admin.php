<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin as AdminControllers;

Route::name('dashboard')->get('/', function () {  
    return view('admin.dashboard');
});

Route::crud('user', AdminControllers\UserController::class);

// Route::crud('page', Controllers\PageController::class);

// Route::crud('post', Controllers\PostController::class);
// Route::crud('post-category', Controllers\PostCategoryController::class);
// Route::crud('post-tag', Controllers\PostTagController::class);

// Route::crud('shop', Controllers\ShopController::class);
// Route::crud('shop-category', Controllers\ShopCategoryController::class);
// Route::crud('shop-tag', Controllers\ShopTagController::class);

// Route::crud('machi', Controllers\MachiController::class);
// Route::crud('machi-tag', Controllers\MachiTagController::class);

// Route::crud('job', Controllers\JobController::class);

// Route::crud('event', Controllers\EventController::class);

// Route::crud('topic', Controllers\TopicController::class);
// Route::crud('topic-category', Controllers\TopicCategoryController::class);
// Route::crud('topic-tag', Controllers\TopicTagController::class);

// Route::crud('reply', Controllers\ReplyController::class);

// Route::crud('report', Controllers\ReportController::class);

// Route::crud('inquiry', Controllers\InquiryController::class);

// Route::prefix('upload')->name('upload.')->group(function ()
// {
//     Route::get('/', [Controllers\UploadController::class, 'index'])->name('index');
//     Route::get('/get-file-manager-items', [Controllers\UploadController::class, 'getFileManagerItems'])->name('get-file-manager-items');
//     Route::post('/ajaxUpload', [Controllers\UploadController::class, 'handleAjaxUpload']);
// });

Route::get('tool/log-viewer', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::get('/test/{name}', function ($name)
{
    return view('admin.test.' . $name);
});