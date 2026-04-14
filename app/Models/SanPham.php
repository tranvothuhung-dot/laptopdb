<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'san_pham';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'tieu_de',
        'ten',
        'gia',
        'hinh_anh',
        'id_danh_muc',
        'bao_hanh',
        'series_model',
        'mau_sac',
        'nhu_cau',
        'cpu',
        'chip_do_hoa',
        'man_hinh',
        'webcam',
        'ram',
        'luu_tru',
        'cong_ket_noi',
        'ket_noi_khong_day',
        'ban_phim',
        'he_dieu_hanh',
        'pin',
        'khoi_luong',
        'bao_mat',
        'created_at',
        'status'
    ];
}