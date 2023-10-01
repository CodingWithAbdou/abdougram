<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Counter;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/profile/{user:username}' , [ProfileController::class, 'index'])->name('my_profile');

Route::controller(PostController::class)->middleware('auth')->group(function () {
    Route::get('/' , 'index')->name('home_page');
    Route::get('/p/create' , 'create')->name('create_post');
    Route::post('/p/create' , 'store')->name('store_post');
    Route::get('/p/{post:slug}' ,'show')->name('show_post');
    Route::get('/p/{post:slug}/edit' , 'edit')->name('edit_post');
    Route::put('/p/{post:slug}/update' , 'update')->name('update_post');
    Route::delete('/p/{post:slug}/delete' , 'destroy')->name('delete_post');

    Route::get('/explore' , 'explore')->name('explore_posts');
});


Route::get('/p/{post:slug}/like' , LikeController::class);


Route::post('/p/{post:slug}/comment' , [CommentController::class , 'store'])->name('store_comment')->middleware('auth');


Route::get('/{user:username}/follow' , [ FollowController::class , 'follow' ])->name('add_follow')->middleware('auth');
Route::get('/{user:username}/unfollow' , [ FollowController::class , 'unfollow' ])->name('add_follow')->middleware('auth');

// Route::get('/counter', Counter::class);

