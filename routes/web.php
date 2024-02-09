<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Models\LinkDetail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $links= LinkDetail::where('status','active')->orderBy('id','desc')->get();
    return view('welcome',compact('links'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [LinkController::class, 'index'])->name('home');

Route::resource('links',LinkController::class);
