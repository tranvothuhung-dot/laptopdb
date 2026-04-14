<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderNotification;

class LaptopController1 extends Controller
{
    public function cartAdd(Request $request) {
        $id = $request->id;
        $num = $request->so_luong ?? 1; 
        
        $cart = session()->get('cart', []);
        
        if(isset($cart[$id])) {
            $cart[$id] += $num; 
        } else {
            $cart[$id] = $num; 
        }
        
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
    }

    public function cartView() {
        $cart = session()->get('cart', []);
        $laptops = [];
        
        if(!empty($cart)) {
            $ids = array_keys($cart); 
            $laptops = DB::table('san_pham')->whereIn('id', $ids)->get(); 
        }
        
        return view('cart' ,[
        'laptops' => $laptops, 
        'cart' => $cart, 
        'title' => 'Giỏ hàng của tôi' 
    ]);
    }

    public function cartDelete(Request $request) {
        $id = $request->id;
        $cart = session()->get('cart', []);
        
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        
        return redirect()->route('cart.view')->with('success', 'Đã xóa sản phẩm khỏi giỏ!');
    }

    // --- HÀM ĐẶT HÀNG (ĐÃ THÊM GỬI MAIL) ---
    public function orderCreate(Request $request) {
        $request->validate([
            'hinh_thuc_thanh_toan' => 'required|in:1,2',
        ]);

        $cart = session()->get('cart', []);
        
        if(empty($cart)) {
            return redirect()->back()->with('error', 'Giỏ hàng của bạn đang trống!');
        }

        $paymentMethods = [
            1 => 'Tiền mặt',
            2 => 'Chuyển khoản',
        ];
        $paymentMethodLabel = $paymentMethods[$request->hinh_thuc_thanh_toan] ?? 'Không xác định';

        // Khai báo email admin bên ngoài để truyền vào transaction
        $adminEmail = 'kien997@gmail.com';

        DB::transaction(function() use ($request, $cart, $adminEmail, $paymentMethodLabel) {
            // 1. Insert vào bảng don_hang 
            $orderId = DB::table('don_hang')->insertGetId([
                'ngay_dat_hang' => now(),
                'tinh_trang' => 1, 
                'hinh_thuc_thanh_toan' => $request->hinh_thuc_thanh_toan,
                'user_id' => Auth::id() 
            ]);

            // 2. Insert vào bảng chi_tiet_don_hang
            $ids = array_keys($cart);
            $laptops = DB::table('san_pham')->whereIn('id', $ids)->get();
            $details = [];

            foreach($laptops as $laptop) {
                $details[] = [
                    'ma_don_hang' => $orderId,
                    'laptop_id' => $laptop->id,
                    'so_luong' => $cart[$laptop->id],
                    'don_gia' => $laptop->gia
                ];
            }
            DB::table('chi_tiet_don_hang')->insert($details);

            // 3. Xóa giỏ hàng
            session()->forget('cart');

            // 4. Thực hiện gửi email thông báo cho Admin
            Notification::route('mail', $adminEmail)->notify(new OrderNotification($orderId, $paymentMethodLabel));
        });

        return redirect()->route('cart.view')->with('success', 'Đặt hàng thành công và đã gửi email thông báo!');
    }

    public function search(Request $request) {
        $keyword = $request->input('keyword');
        
        $laptops = DB::table('san_pham')
                     ->where('tieu_de', 'like', '%' . $keyword . '%')
                     ->get();

        return view('laptop.index', compact('laptops', 'keyword'));
    }
}