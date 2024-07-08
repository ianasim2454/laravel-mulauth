<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



//Admin Part
Route::get('/admin/dashboard',[AdminController::class,'index'])->middleware(['auth', 'admin']);


Route::get('/admin/logout',[AdminController::class,'AdminLogOut'])->name('admin.logout');

Route::get('/login',[AdminController::class,'AdminLoginForm'])->name('login'); 


// Route::get('/auth/google',[GoogleController::class,'redirect'])->name('google');
// Route::get('auth/google/callback',[GoogleController::class,'callbackGoogle'])->name('google.callback');