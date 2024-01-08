<?php

use App\Http\Controllers\DashboadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});



Route::get('/users', function () {
    return view('users.index');
});

Route::get('/register/seeker',[UserController::class,'createSeeker'])->name('create.seeker');
Route::post('/register/seeker',[UserController::class,'storeSeeker'])->name('store.seeker');

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'loginPost'])->name('login.post');

Route::get('/dashboad', [DashboadController::class, 'index'])->name('dashboad');