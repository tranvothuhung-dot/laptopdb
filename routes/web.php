<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('laptop/danhmuc/{id}', [HomeController::class, 'danhmuc']);
Route::get('/chitiet/{id}', [HomeController::class, 'chitiet'])->name('laptop.chitiet');
Route::post('/timkiem', [HomeController::class, 'timkiem']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');


require __DIR__.'/auth.php';
