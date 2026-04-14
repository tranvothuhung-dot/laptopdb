<x-laptop-layout :title="'Quản lý sản phẩm'" :categories="$categories">

    <style>
        .title-page {
            text-align: center;
            color: #1155cc;
            font-weight: bold;
            margin: 10px 0 15px 0;
        }

        #productTable th,
        #productTable td {
            vertical-align: top;
            font-size: 14px;
        }

        #productTable th {
            text-align: center;
        }

        .product-img {
            width: 55px;
            height: auto;
            border: 1px solid #ddd;
            padding: 2px;
            background: #fff;
        }

        .btn-action {
            padding: 4px 10px;
            font-size: 14px;
            border-radius: 4px;
            text-decoration: none;
            color: white !important;
            display: inline-block;
            border: none;
        }

        .btn-view {
            background-color: #0d6efd;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .action-form {
            display: inline-block;
            margin-left: 4px;
        }
    </style>

    <h2 class="title-page">QUẢN LÝ SẢN PHẨM</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table id="productTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>CPU</th>
                <th>RAM</th>
                <th>Ổ cứng</th>
                <th>Khối lượng</th>
                <th>Nhu cầu</th>
                <th>Giá</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sanPhams as $sp)
                <tr>
                    <td>{{ $sp->tieu_de }}</td>
                    <td>{{ $sp->cpu }}</td>
                    <td>{{ $sp->ram }}</td>
                    <td>{{ $sp->luu_tru }}</td>
                    <td>{{ $sp->khoi_luong }}</td>
                    <td>{{ $sp->nhu_cau }}</td>
                    <td>{{ number_format($sp->gia, 2, '.', '') }}</td>
                    <td class="text-center">
                        <img src="{{ asset('images/' . $sp->hinh_anh) }}"
                             alt="{{ $sp->ten }}"
                             class="product-img">
                    </td>
                    <td class="text-center">
                        <a href="{{ route('sanpham.show', $sp->id) }}" class="btn-action btn-view">
                            Xem
                        </a>

                        <form action="{{ route('sanpham.destroy', $sp->id) }}"
                              method="POST"
                              class="action-form"
                              onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                            @csrf
                            <button type="submit" class="btn-action btn-delete">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            $('#productTable').DataTable({
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100],
                language: {
                    lengthMenu: "_MENU_ entries per page",
                    search: "Search:",
                    info: "Hiển thị _START_ đến _END_ của _TOTAL_ sản phẩm",
                    infoEmpty: "Không có dữ liệu",
                    zeroRecords: "Không tìm thấy sản phẩm",
                    paginate: {
                        previous: "Trước",
                        next: "Sau"
                    }
                }
            });
        });
    </script>

</x-laptop-layout>