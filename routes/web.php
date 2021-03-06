<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    Route::match(['get','post'],'/login','AdminController@login');
   
    Route::group(['middleware'=>['admin']],function(){
        Route::get('/dashboard','AdminController@dashboard');
        Route::match(['get','post'],'/update-admin-password','AdminController@updatePassword');
        Route::match(['get','post'],'/update-admin-details','AdminController@updateDetails');
        Route::post('/check-current-password','AdminController@checkCurrentPassword');
        Route::get('/logout','AdminController@logout');
    });
    
});
