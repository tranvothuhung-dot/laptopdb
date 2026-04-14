<x-laptop-layout>
    <x-slot name="title">Chi Tiết {{ $laptop->tieu_de }}</x-slot>

    <!-- ====== NỘI DUNG CHÍNH ====== -->
    <div class="container-fluid main-content" style="padding: 30px 0;">
        <div class="row" style="font-family: 'Roboto', 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: #333;">
            
            <!-- CỘT TRÁI: HÌNH ẢNH SẢN PHẨM (40%) -->
            <div class="col-lg-5 col-md-4 image-section" style="background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                <div class="text-center">
                    <img src="{{ asset('storage/image/' .$laptop->hinh_anh) }}" 
                         alt="Hình ảnh {{ $laptop->tieu_de }}" 
                         class="img-fluid" 
                         style="max-width: 100%; height: auto; border-radius: 8px;">
                </div>
            </div>
            
            <!-- CỘT PHẢI: THÔNG TIN CHI TIẾT (60%) -->
            <div class="col-lg-7 col-md-8 info-section" style="padding: 0 0 0 30px;">
                
                <!-- TIÊU ĐỀ SẢN PHẨM -->
                <h1 class="product-title" style="font-size: 2rem; font-weight: 600; line-height: 1.3; margin-bottom: 25px; color: #1a1a1a; letter-spacing: -0.5px;">
                    {{ $laptop->tieu_de }}
                </h1>

                <!-- DANH SÁCH THÔNG SỐ KỸ THUẬT -->
                <div class="specifications-section" style="margin-bottom: 30px; padding-bottom: 25px; border-bottom: 1px solid #e0e0e0;">
                    <h3 style="font-size: 0.9rem; text-transform: uppercase; color: #666; font-weight: 600; letter-spacing: 1px; margin-bottom: 15px;">
                        Thông số kỹ thuật
                    </h3>
                    
                    <div style="line-height: 2; font-size: 15px; color: #444;">
                        <div style="display: flex; margin-bottom: 8px;">
                            <span style="font-weight: 700; min-width: 150px;">CPU:</span>
                            <span>{{ $laptop->cpu }}</span>
                        </div>
                        <div style="display: flex; margin-bottom: 8px;">
                            <span style="font-weight: 700; min-width: 150px;">RAM:</span>
                            <span>{{ $laptop->ram }}</span>
                        </div>
                        <div style="display: flex; margin-bottom: 8px;">
                            <span style="font-weight: 700; min-width: 150px;">Ổ cứng:</span>
                            <span>{{ $laptop->luu_tru }}</span>
                        </div>
                        <div style="display: flex; margin-bottom: 8px;">
                            <span style="font-weight: 700; min-width: 150px;">Chip đồ họa:</span>
                            <span>{{ $laptop->chip_do_hoa }}</span>
                        </div>
                        <div style="display: flex; margin-bottom: 8px;">
                            <span style="font-weight: 700; min-width: 150px;">Nhu cầu:</span>
                            <span>{{ $laptop->nhu_cau ?? 'Văn phòng' }}</span>
                        </div>
                        <div style="display: flex; margin-bottom: 8px;">
                            <span style="font-weight: 700; min-width: 150px;">Màn hình:</span>
                            <span>{{ $laptop->man_hinh }}</span>
                        </div>
                        <div style="display: flex;">
                            <span style="font-weight: 700; min-width: 150px;">Hệ điều hành:</span>
                            <span>{{ $laptop->he_dieu_hanh }}</span>
                        </div>
                    </div>
                </div>

                <!-- GIÁ CẢ -->
                <div class="price-section" style="margin-bottom: 30px; padding-bottom: 30px; border-bottom: 1px solid #e0e0e0;">
                    <div style="display: flex; align-items: baseline; gap: 15px;">
                        <span style="font-size: 0.9rem; text-transform: uppercase; color: #666; font-weight: 600; letter-spacing: 1px;">
                            Giá bán:
                        </span>
                        <span style="font-size: 2.2rem; color: #d32f2f; font-weight: 700; letter-spacing: -1px;">
                            {{ number_format($laptop->gia, 0, ',', '.') }}
                        </span>
                        <span style="font-size: 1.1rem; color: #d32f2f; font-weight: 600;">VND</span>
                    </div>
                </div>

                <!-- NÚT HÀNH ĐỘNG -->
                <form action="#" method="POST" class="action-section" style="margin-bottom: 30px;">
                    @csrf
                    <input type="hidden" name="laptop_id" value="{{ $laptop->id }}">
                    
                    <div style="display: flex; align-items: center; gap: 20px; flex-wrap: wrap;">
                        <!-- OÀN NHẬP SỐ LƯỢNG -->
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <label style="font-size: 14px; font-weight: 600; color: #333; margin: 0; white-space: nowrap;">
                                Số lượng:
                            </label>
                            <div class="quantity-input" style="display: flex; align-items: center; border: 1px solid #d0d0d0; border-radius: 6px; background-color: #f5f5f5;">
                                <button type="button" class="btn-quantity" style="width: 36px; height: 36px; border: none; background: none; font-size: 18px; cursor: pointer; color: #666;">−</button>
                                <input type="number" name="so_luong" value="1" min="1" 
                                       class="form-control text-center quantity-field" 
                                       style="width: 50px; height: 36px; border: none; background-color: white; font-weight: 600; padding: 0; font-size: 15px;">
                                <button type="button" class="btn-quantity" style="width: 36px; height: 36px; border: none; background: none; font-size: 18px; cursor: pointer; color: #666;">+</button>
                            </div>
                        </div>

                        <!-- NÚT THÊM VÀO GIỎ HÀNG -->
                        <button type="submit" class="btn-add-to-cart" 
                                style="padding: 12px 32px; background-color: #0066cc; color: white; border: none; border-radius: 8px; 
                                       font-size: 15px; font-weight: 600; cursor: pointer; transition: background-color 0.3s ease;
                                       box-shadow: 0 2px 8px rgba(0, 102, 204, 0.2);">
                                Thêm vào giỏ hàng
                        </button>
                    </div>
                </form>

                <!-- PHẦN "THÔNG TIN KHÁC" -->
                <div class="extra-info-section" style="padding-top: 25px; border-top: 1px solid #d0d0d0;">
                    <h3 style="font-size: 1.1rem; font-weight: 600; color: #1a1a1a; margin-bottom: 20px;">
                        Thông tin khác
                    </h3>
                    
                    <div style="line-height: 2; font-size: 15px; color: #555;">
                        <div style="margin-bottom: 10px;">
                            <span style="font-weight: 600; color: #333;">Khối lượng:</span>
                            <span style="margin-left: 10px;">{{ $laptop->khoi_luong ?? '2.9 kg' }}</span>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <span style="font-weight: 600; color: #333;">Webcam:</span>
                            <span style="margin-left: 10px;">{{ $laptop->webcam ?? 'FHD webcam' }}</span>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <span style="font-weight: 600; color: #333;">Pin:</span>
                            <span style="margin-left: 10px;">{{ $laptop->pin ?? '3 cell 65 Wh, Pin liền' }}</span>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <span style="font-weight: 600; color: #333;">Kết nối không dây:</span>
                            <span style="margin-left: 10px;">{{ $laptop->ket_noi_khong_day ?? 'Wi-Fi 7 (802.11be), Bluetooth 5.3' }}</span>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <span style="font-weight: 600; color: #333;">Bàn phím:</span>
                            <span style="margin-left: 10px;">{{ $laptop->ban_phim ?? 'Bàn phím Chiclet với phím Copilot, không phím số, Có LED' }}</span>
                        </div>
                        <div>
                            <span style="font-weight: 600; color: #333;">Cổng kết nối:</span>
                            <span style="margin-left: 10px;">{!! $laptop->cong_ket_noi !!}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- CSS HỖ TRỢ VỀ TƯƠNG TÁC -->
    <style>
        .btn-add-to-cart:hover {
            background-color: #0052a3;
            box-shadow: 0 4px 12px rgba(0, 102, 204, 0.3);
        }
        
        .btn-add-to-cart:active {
            transform: translateY(1px);
        }

        .btn-quantity:hover {
            background-color: #e8e8e8 !important;
        }

        .quantity-field:focus {
            outline: 2px solid #0066cc;
        }

        @media (max-width: 768px) {
            .col-md-8 {
                padding: 0 !important;
            }
            
            .banner-section {
                flex-direction: column;
                text-align: center;
            }

            .product-title {
                font-size: 1.5rem;
            }

            h1, h3, h5 {
                font-size: 1.1rem;
            }
        }
    </style>

</x-laptop-layout>