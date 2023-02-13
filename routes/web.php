<?php

use App\Http\Controllers\DetailUsersController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\UpdateUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserListController;
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

    // Route untuk mengedit users
    Route::controller(UpdateUserController::class)->group(function (){
        Route::get('/users/update/{name}','index');
        Route::put('/users/update/submit','updateUser');
    });

    // Route untuk menghapus user
    Route::get('/users',[UserListController::class, 'index'])->name('users');
    Route::delete('/users/delete/{id}', [UserListController::class,'destroy'])->name('delete');

    // Route untuk menghapus dan menampilkan semua data user dengan yajrabox
    Route::prefix('user')->middleware('rolecek')->group(function() {
        Route::controller(UserController::class)->group(function () {
            Route::get('/list',  'list')->name('user.list');
            Route::get('/',  'index')->name('user.index');
            Route::get('/detail',  'detail')->name('user.detail');
            Route::delete('/delete/{user}', 'destroy')->name('destroy');
        });
    });


});



Route::prefix('my-profile')->middleware(['auth', 'verified'])->group(function() {
    Route::get('/', [MyProfileController::class, 'index'])->name('my.profile.index');
    Route::put('/', [MyProfileController::class, 'update'])->name('my.profile.update');
});

