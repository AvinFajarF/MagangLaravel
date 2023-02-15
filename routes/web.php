<?php

use App\Http\Controllers\DetailUsersController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function() {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::middleware(['verified', 'auth', 'is_blocked'])->group(function(){
    // route home
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/users/details/{name}',DetailUsersController::class);

    // route untuk logout
    Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout']);

    // Route untuk menghapus dan menampilkan semua data user dengan yajrabox
    Route::prefix('user')->middleware('rolecek')->group(function() {
        Route::controller(UserController::class)->group(function () {
            Route::get('/list',  'list')->name('user.list');
            Route::get('/',  'index')->name('user.index');

            // Route untuk update dan melihat detail user
            Route::put('/detail/{id}',  'update')->name('user.update');
            Route::get('/detail/{id}',  'detail')->name('user.detail');

            // Route untuk delete user
            Route::delete('/delete/{user}', 'destroy')->name('destroy');
        });
    });

    // Route untuk tag
    Route::prefix('tag')->group(function (){
        Route::controller(TagsController::class)->group(function () {
            // Route untuk return view
            Route::get('/','index')->name('tag.TagView');
            // Route view list
            Route::get('/list','listTag')->name('tag.listTag');
            // Route untuk menyimpan tag
            Route::get('/view','viewTagCreate')->name('tag.TagCreate');
            Route::post('/','StoreTag')->name('tag.StoreTag');
            // Route untuk menghapus tag
            Route::delete('/destroy/{id}','destroy')->name('tag.StoreTag');
            // Route untuk mengedit tag dan view edit tag
            Route::get('/edit/{id}','viewTagEdit')->name('tag.viewTagEdit');
            Route::put('/edit/{id}','update')->name('tag.EditTag');
        });
    })->name('tag');


    Route::prefix('my-profile')->group(function() {
        Route::get('/', [MyProfileController::class, 'index'])->name('my.profile.index');
        Route::put('/', [MyProfileController::class, 'update'])->name('my.profile.update');
    });

});
