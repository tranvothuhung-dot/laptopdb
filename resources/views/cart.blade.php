<x-laptop-layout title="Giỏ hàng">

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <h3 class="text-center text-primary font-weight-bold mb-4">DANH SÁCH SẢN PHẨM TRONG GIỎ HÀNG</h3>
    
    <table class="table table-bordered text-center">
        <thead class="thead-light">
            <tr>
                <th style="width: 50px;">STT</th>
                <th>Tên sản phẩm</th>
                <th style="width: 150px;">Số lượng</th>
                <th>Đơn giá</th>
                <th style="width: 100px;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @php $stt = 1; @endphp
            @forelse($laptops as $laptop)
                <tr>
                    <td>{{ $stt++ }}</td>
                    <td class="text-left">{{ $laptop->tieu_de }}</td>
                    <td>{{ $cart[$laptop->id] }}</td>
                    <td class="text-danger font-weight-bold">
                        {{ number_format($laptop->gia, 0, ',', '.') }}đ
                    </td>
                    <td>
                        <form action="{{ route('cart.delete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $laptop->id }}">
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Giỏ hàng đang trống!</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if(count($laptops) > 0)
    <div class="row justify-content-center mt-4">
        <div class="col-md-6 border p-3 shadow-sm rounded">
            <form action="{{ route('order.create') }}" method="POST" class="text-center">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">Hình thức thanh toán</label>
                    <select name="hinh_thuc_thanh_toan" class="form-control w-50 m-auto">
                        <option value="1">Tiền mặt</option>
                        <option value="2">Chuyển khoản</option>
                    </select>
                </div>
                <p class="text-muted">Sau khi nhấn ĐẶT HÀNG, đơn hàng sẽ được lưu và gửi email thông báo tới kien997@gmail.com.</p>
                <button type="submit" class="btn btn-primary mt-2">ĐẶT HÀNG</button>
            </form>
        </div>
    </div>
    @endif
</div>
</x-laptop-layout>