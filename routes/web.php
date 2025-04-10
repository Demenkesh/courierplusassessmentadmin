<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return redirect('/login');
});
Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::post('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::controller(AdminController::class)->group(function () {

        Route::get('/admin/approve-user', 'index');
        Route::get('/admin/viewpost', 'alltenantpost');
        Route::get('admin/get-post-details/{postId}', 'getPostDetails');
        Route::post('admin/approve-user/{user}', 'approveUser')->name('admin.approve.user');
    });
});

Auth::routes();
// In routes/web.php

