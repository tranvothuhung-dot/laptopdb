<x-laptop-layout>
    <x-slot name="title">Laptop</x-slot>

    <div style="margin-bottom: 20px;">
        <form action="" method="GET" class="d-inline">
            <span style="margin-right: 15px; font-weight: normal; color: #333;">Tìm kiếm theo</span>
            
            <button type="submit" name="sort" value="asc" 
                style="display: inline-block; background-color: #fff; border: 1px solid #dbdbdb; border-radius: 10px; padding: 10px 20px; color: #000; text-align: center; margin-right: 10px; cursor: pointer; text-decoration: none;">
                Giá tăng dần
            </button>
            
            <button type="submit" name="sort" value="desc" 
                style="display: inline-block; background-color: #fff; border: 1px solid #dbdbdb; border-radius: 10px; padding: 10px 20px; color: #000; text-align: center; cursor: pointer; text-decoration: none;">
                Giá giảm dần
            </button>
        </form>
    </div>

    <div class="list-laptop" style="display:grid; grid-template-columns:repeat(4,25%);">
        @foreach($laptops as $row)
        <div class="laptop" style="margin:10px; text-align:center; border:1px solid #dbdbdb; border-radius:5px; padding:10px;">
            <a href="{{ route('laptop.chitiet', $row->id) }}" style="text-decoration:none; color:#000;">
                <img src="{{ asset('storage/image/' .$row->hinh_anh) }}" alt="{{ $row->tieu_de }}" width="100%">
                <div class="laptop-info" style="display: block; text-align: center; padding: 10px 0;">
                    <p style="font-weight:bold; margin-bottom:5px;">{{ $row->tieu_de }}</p>
                    <p style="color:red; margin-bottom: 0; font-weight:bold;">{{ number_format($row->gia, 0, ',', '.') }} đ</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</x-laptop-layout>