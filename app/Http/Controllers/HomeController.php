<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request) {
        $categories = DB::table('danh_muc_laptop')->get();
        $query = DB::table('san_pham')->where('status', 1);

        // Nút sắp xếp giá tăng/giảm
        if ($request->has('sort')) {
            if ($request->sort == 'asc') $query->orderBy('gia', 'asc');
            elseif ($request->sort == 'desc') $query->orderBy('gia', 'desc');
        }

        // Lấy 20 laptop như Yêu cầu 2
        $laptops = $query->limit(20)->get(); 

        return view('laptop.index', compact('laptops', 'categories'));
    }

    public function danhmuc(Request $request, $id) {
        $categories = DB::table('danh_muc_laptop')->get();
        
        // Truy vấn laptop theo id hãng
        $query = DB::table('san_pham')
            ->where('id_danh_muc', $id)
            ->where('status', 1);

        if ($request->has('sort')) {
            if ($request->sort == 'asc') $query->orderBy('gia', 'asc');
            elseif ($request->sort == 'desc') $query->orderBy('gia', 'desc');
        }

        $laptops = $query->get();

        return view('laptop.index', compact('laptops', 'categories'));
    }

    public function chitiet($id) {
        $categories = DB::table('danh_muc_laptop')->get();
        $laptop = DB::table('san_pham')->where('id', $id)->first();
        
        if(!$laptop) abort(404);

        return view('laptop.chitiet', compact('laptop', 'categories'));
    }
    public function timkiem(Request $request) {
        $keyword = $request->input('keyword');
        $categories = DB::table('danh_muc_laptop')->get();

        $laptops = DB::table('san_pham')
            ->where('tieu_de', 'like', '%' . $keyword . '%')
            ->where('status', 1)
            ->get();

        return view('laptop.index', compact('laptops', 'categories'));
    }
}