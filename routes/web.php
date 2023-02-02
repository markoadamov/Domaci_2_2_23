<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/createpost', function () {
    return view('createpost');
})->middleware(['auth','authAdmin']);

Route::get('/about', function () {
    return view('about');
})->middleware('auth');

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth');

Route::get('/post-dashboard', [PostController::class, 'showPostsTable'])->middleware(['auth','authAdmin']);
Route::get('/user-dashboard', [UserController::class, 'showUsersTable'])->middleware(['auth','authAdmin']);

Route::get('/posts', [PostController::class, 'index'])->middleware('auth');
Route::get('/posts/{id}', [PostController::class, 'show'])->middleware('auth');

Route::post('/createpost', [PostController::class, 'store']);
Route::post('/createcomment', [CommentController::class, 'store']);

Route::get('signup', [AuthController::class, 'getSignUp']);
Route::get('signin', [AuthController::class, 'getSignIn']);
Route::get('signout', [AuthController::class, 'signout']);
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/signin', [AuthController::class, 'signin']);

Route::post('delete-post', [PostController::class, 'deletePost']);