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
                <th style="width: 120px;">Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
                <th style="width: 100px;">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @php
                $stt = 1;
                $total = 0;
            @endphp
            @forelse($laptops as $laptop)
                @php $subtotal = $cart[$laptop->id] * $laptop->gia; $total += $subtotal; @endphp
                <tr>
                    <td>{{ $stt++ }}</td>
                    <td class="text-left">{{ $laptop->tieu_de }}</td>
                    <td>{{ $cart[$laptop->id] }}</td>
                    <td class="text-danger font-weight-bold">
                        {{ number_format($laptop->gia, 0, ',', '.') }}đ
                    </td>
                    <td class="text-danger font-weight-bold">
                        {{ number_format($subtotal, 0, ',', '.') }}đ
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
                    <td colspan="6">Giỏ hàng đang trống!</td>
                </tr>
            @endforelse
        </tbody>
        @if($total > 0)
            <tfoot>
                <tr>
                    <td colspan="4" class="text-right font-weight-bold">Tổng cộng</td>
                    <td class="text-danger font-weight-bold">{{ number_format($total, 0, ',', '.') }}đ</td>
                </tr>
            </tfoot>
        @endif
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
                <button type="submit" class="btn btn-primary mt-2">ĐẶT HÀNG</button>
            </form>
        </div>
    </div>
    @endif
</div>
</x-laptop-layout>