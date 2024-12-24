<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthSocialiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('blog');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('blog.show')->middleware('log.visit');
Route::get('/posts/category/{category:slug}', [PostController::class, 'categoryShow'])->name('posts.category');

Route::prefix('dashboard')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::group(['middleware' => ['adminOrMembers']], function () {
            Route::get('/posts', [DashboardPostController::class, 'index'])->name('dashboard.posts');
            Route::get('/posts/create', [DashboardPostController::class, 'createView'])->name('dashboard.posts.createView');
            Route::get('/posts/edit/{slug}', [DashboardPostController::class, 'editView'])->name('dashboard.posts.editView');
            Route::post('/posts/create', [DashboardPostController::class, 'create'])->name('dashboard.posts.create');
            Route::post('/posts/{post:slug}/edit', [DashboardPostController::class, 'edit'])->name('dashboard.posts.edit');
            Route::delete('/posts/delete/{id}', [DashboardPostController::class, 'delete'])->name('dashboard.posts.delete');
            Route::post('/upload-image', [DashboardPostController::class, 'upload'])->name('upload.image');
            Route::get('/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->name('dashboard.posts.checkSlug');
        });


        Route::group(['middleware' => ['admin']], function () {
            Route::get('/user', [DashboardUserController::class, 'index'])->name('dashboard.user');
            Route::put('/user/{id}', [DashboardUserController::class, 'editRoles'])->name('dashboard.user.edit');

            Route::get('/posts/category', [CategoryController::class, 'index'])->name('dashboard.posts.category');
            Route::post('/posts/category', [CategoryController::class, 'store'])->name('dashboard.posts.category.create');
            Route::post('/posts/category/update/{id}', [CategoryController::class, 'update'])->name('dashboard.posts.category.update');
            Route::delete('/posts/category/delete/{id}', [CategoryController::class, 'destroy'])->name('dashboard.posts.category.delete');
        });
    });
});

Route::get('/dashboard/posts/category/checkSlug', [CategoryController::class, 'checkSlug']);

Route::prefix('auth')->group(function () {
    Route::get('/login', [Authcontroller::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [Authcontroller::class, 'authenticate'])->name('login');
    Route::get('/register', [Authcontroller::class, 'registerView'])->name('registerView')->middleware('guest');
    Route::post('/register', [Authcontroller::class, 'register'])->name('register')->middleware('guest');

    Route::post('/logout', [Authcontroller::class, 'logout'])->name('logout');

    Route::get('/redirect', [AuthSocialiteController::class, 'redirect'])->name('auth.redirect');

    Route::get('/google/callback', [AuthSocialiteController::class, 'callback'])->name('auth.callback');
});


Route::fallback(function () {
    return view('components.404');
});
