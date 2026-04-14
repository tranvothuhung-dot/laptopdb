<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaptopController1; 

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';

Route::get('/profile', function () {
    return view('profile'); 
})->name('profile.edit');


// ======= CÂU 4: GIỎ HÀNG & ĐẶT HÀNG =======
Route::get('/cart', [LaptopController1::class, 'cartView'])->name('cart.view');
Route::post('/cart/add', [LaptopController1::class, 'cartAdd'])->name('cart.add'); // Form thêm vào giỏ
Route::post('/cart/delete', [LaptopController1::class, 'cartDelete'])->name('cart.delete');
// Yêu cầu đăng nhập mới được đặt hàng
Route::post('/order/create', [LaptopController1::class, 'orderCreate'])->middleware('auth')->name('order.create');

// ======= CÂU 5: TÌM KIẾM =======
Route::get('/search', [LaptopController1::class, 'search'])->name('laptop.search');
