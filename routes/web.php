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

Route::get('/client', [App\Http\Controllers\adminController::class, 'show'])->name('client.show');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth','isAdmin')->group(function(){
    
Route::get('/admin', [App\Http\Controllers\adminController::class, 'index'])->name('admin.index');
    
    
    
});

Route::prefix('')->middleware('auth')->group(function(){
    

});
