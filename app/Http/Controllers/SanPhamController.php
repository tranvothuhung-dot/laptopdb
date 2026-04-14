<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    public function index()
    {
        $categories = DB::table('danh_muc_laptop')->get();

        $sanPhams = SanPham::where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.sanpham.index', compact('sanPhams', 'categories'));
    }

    public function show($id)
    {
        $categories = DB::table('danh_muc_laptop')->get();

        $sanPham = SanPham::where('status', 1)->findOrFail($id);

        return view('admin.sanpham.show', compact('sanPham', 'categories'));
    }

    public function destroy($id)
    {
        $sanPham = SanPham::findOrFail($id);
        $sanPham->status = 0;
        $sanPham->save();

        return redirect()->route('sanpham.index')->with('success', 'Xóa mềm sản phẩm thành công');
    }
}