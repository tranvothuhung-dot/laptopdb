<x-laptop-layout :title="'Chi tiết sản phẩm'" :categories="$categories">

    <style>
        .detail-box {
            width: 100%;
            margin: 20px auto;
            background: white;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.08);
        }

        .detail-title {
            color: #1155cc;
            text-align: center;
            margin-bottom: 25px;
            font-weight: bold;
        }

        .detail-row {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .detail-row strong {
            display: inline-block;
            width: 180px;
        }

        .detail-img {
            width: 220px;
            border: 1px solid #ddd;
            padding: 4px;
            background: #fff;
        }

        .btn-back {
            display: inline-block;
            margin-top: 20px;
            background: #198754;
            color: white !important;
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>

    <div class="detail-box">
        <h2 class="detail-title">CHI TIẾT SẢN PHẨM</h2>

        <div class="detail-row"><strong>ID:</strong> {{ $sanPham->id }}</div>
        <div class="detail-row"><strong>Tiêu đề:</strong> {{ $sanPham->tieu_de }}</div>
        <div class="detail-row"><strong>Tên:</strong> {{ $sanPham->ten }}</div>
        <div class="detail-row"><strong>Giá:</strong> {{ number_format($sanPham->gia, 0, ',', '.') }} VNĐ</div>
        <div class="detail-row"><strong>Danh mục:</strong> {{ $sanPham->id_danh_muc }}</div>
        <div class="detail-row"><strong>Bảo hành:</strong> {{ $sanPham->bao_hanh }}</div>
        <div class="detail-row"><strong>Series model:</strong> {{ $sanPham->series_model }}</div>
        <div class="detail-row"><strong>Màu sắc:</strong> {{ $sanPham->mau_sac }}</div>
        <div class="detail-row"><strong>Nhu cầu:</strong> {{ $sanPham->nhu_cau }}</div>
        <div class="detail-row"><strong>CPU:</strong> {{ $sanPham->cpu }}</div>
        <div class="detail-row"><strong>Chip đồ họa:</strong> {{ $sanPham->chip_do_hoa }}</div>
        <div class="detail-row"><strong>Màn hình:</strong> {{ $sanPham->man_hinh }}</div>
        <div class="detail-row"><strong>Webcam:</strong> {{ $sanPham->webcam }}</div>
        <div class="detail-row"><strong>RAM:</strong> {{ $sanPham->ram }}</div>
        <div class="detail-row"><strong>Lưu trữ:</strong> {{ $sanPham->luu_tru }}</div>
        <div class="detail-row"><strong>Cổng kết nối:</strong> {{ $sanPham->cong_ket_noi }}</div>
        <div class="detail-row"><strong>Kết nối không dây:</strong> {{ $sanPham->ket_noi_khong_day }}</div>
        <div class="detail-row"><strong>Bàn phím:</strong> {{ $sanPham->ban_phim }}</div>
        <div class="detail-row"><strong>Hệ điều hành:</strong> {{ $sanPham->he_dieu_hanh }}</div>
        <div class="detail-row"><strong>Pin:</strong> {{ $sanPham->pin }}</div>
        <div class="detail-row"><strong>Khối lượng:</strong> {{ $sanPham->khoi_luong }}</div>
        <div class="detail-row"><strong>Bảo mật:</strong> {{ $sanPham->bao_mat }}</div>

        <div class="detail-row">
            <strong>Hình ảnh:</strong><br>
            <img src="{{ asset('images/' . $sanPham->hinh_anh) }}"
                 alt="{{ $sanPham->ten }}"
                 class="detail-img">
        </div>

        <a href="{{ route('sanpham.index') }}" class="btn-back">Quay lại</a>
    </div>

</x-laptop-layout>