<x-laptop-layout>
    <x-slot name="title">
        Laptop
    </x-slot>

    @if(isset($keyword))
        <h3 class="mb-4">Kết quả tìm kiếm cho "{{ $keyword }}"</h3>
        <div class="alert alert-info">Đang chờ giao diện trang chủ, phần hiển thị kết quả sẽ cập nhật sau.</div>
    @else
        <div class="alert alert-secondary">Nhập từ khóa và nhấn tìm kiếm để tìm laptop.</div>
    @endif
</x-laptop-layout>