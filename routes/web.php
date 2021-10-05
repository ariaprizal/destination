<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('post.login');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('post.register');



Route::get('/destination', [DestinationController::class, 'index'])->name('destination');
Route::get('/detail/{id}', [GuestController::class, 'show'])->name('detail');
Route::get('/search', [GuestController::class, 'search'])->name('search');


// Authenticate

Route::get('/profile',[UserController::class, 'index'])->name('profile')->middleware('auth');

Route::post('/logout',[AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit.profile')->middleware('auth');
Route::put('/edit/{id}', [UserController::class, 'update'])->name('update.profile')->middleware('auth');


Route::get('/create', [DestinationController::class, 'create'])->name('create')->middleware('auth');
Route::post('/create', [DestinationController::class, 'store'])->name('post.create')->middleware('auth');
Route::get('/destination/edit/{id}', [DestinationController::class, 'edit'])->name('edit.destination')->middleware('auth');
Route::put('/destination/edit/{id}', [DestinationController::class, 'update'])->name('post.edit')->middleware('auth');
Route::get('/destination/delete/{id}', [DestinationController::class, 'destroy'])->name('delete.destination')->middleware('auth');

Route::get('/destination/edit/delete/image/{id}', [DestinationController::class, 'destroyImage'])->name('delete.image')->middleware('auth');
Route::post('/destination/add/gallery/{id}', [DestinationController::class, 'addGallery'])->name('add.gallery')->middleware('auth');