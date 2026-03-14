<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;




Route::get('/register', [AuthController::class,'showRegisterForm']);
Route::post('/register', [AuthController::class,'register']);

Route::get('/login', [AuthController::class,'showLoginForm']);
Route::post('/login', [AuthController::class,'login']);

Route::get('/logout', [AuthController::class,'logout']);

// page edit
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// update action


Route::middleware(['auth.custom'])->group(function(){
    Route::get('/posts', [PostController::class,'index'])->name('posts.index');
    Route::post('/posts', [PostController::class,'store'])->name('posts.store');
    Route::put('/posts/{post}', [PostController::class,'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class,'destroy'])->name('posts.destroy');
    Route::post('/posts/{post}/like', [PostController::class,'like'])->name('posts.like');
});