<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;
Route::get('/', [HomeController::class, 'index']);
Route::get('/quan-ly-san-pham', [SanPhamController::class, 'index'])->name('sanpham.index');
Route::get('/quan-ly-san-pham/xem/{id}', [SanPhamController::class, 'show'])->name('sanpham.show');
Route::post('/quan-ly-san-pham/xoa/{id}', [SanPhamController::class, 'destroy'])->name('sanpham.destroy');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
