<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\userPostController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\PostController;
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

	return view('home');

})->name('home');

Route::get('/dashbord', [DashbordController::class, 'index']);

//register
Route::post('/register', [RegisterController::class, "register"]);

Route::view('/register', 'Auth.Register')->middleware('guest');

//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

//logout
Route::post('/logout', [LogoutController::class, 'logout']);

//post Controller
Route::get('/post', [PostController::class, 'index'])->name('post');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
Route::post('/post', [PostController::class, 'post'])->name('post');

//user post controller 
Route::get('user/{user:username}/posts', [userPostController::class, 'index'])->name('user.posts');

///likes controller 
Route::post('/post/{post}/likes',[PostLikeController::class,'store'])->name('post.like');
Route::delete('/post/{post}/likes',[PostLikeController::class,'destroy'])->name('post.like');

////delete post
Route::delete('/post/{post}/delete',[PostController::class,'delete'])->name('post.delete');