<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin as AdminControllers;

Route::name('dashboard')->get('/', function () {  
    return view('admin.dashboard');
});

Route::crud('user', AdminControllers\UserController::class);

Route::crud('spot', AdminControllers\SpotController::class);
Route::crud('spot-category', AdminControllers\SpotCategoryController::class);

Route::crud('goods', AdminControllers\GoodsController::class);
Route::crud('event', AdminControllers\EventController::class);
Route::crud('event-category', AdminControllers\EventCategoryController::class);

Route::crud('comment', AdminControllers\CommentController::class);
Route::crud('report', AdminControllers\ReportController::class);



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

Route::get('file-library', [AdminControllers\FileManagerController::class, 'fileLibrary'])->name('file-library');


Route::prefix('ajax')->name('ajax.')->group(function ()
{
    Route::prefix('file-manager')->name('file-manager.')->group(function ()
    {
        Route::get('/fetch-data', [AdminControllers\FileManagerController::class, 'fetchData'])->name('fetch-data');

        Route::post('/create-folder', [AdminControllers\FileManagerController::class, 'createFolder'])->name('create-folder');

        Route::post('/delete-folder', [AdminControllers\FileManagerController::class, 'deleteFolder'])->name('delete-folder');

        Route::post('/upload', [AdminControllers\FileManagerController::class, 'upload']);

        Route::post('/delete-file', [AdminControllers\FileManagerController::class, 'deleteFile'])->name('delete-file');
    });
    
   Route::prefix('taxonomy')->name('taxonomy.')->group(function ()
   {
        Route::get('/fetch', [AdminControllers\AjaxTaxonomyController::class, 'fetchItems'])->name('fetch');
   });
});

Route::get('tool/log-viewer', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::get('/test/{name}', function ($name)
{
    return view('admin.test.' . $name);
});