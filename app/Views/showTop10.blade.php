@foreach($data as $item)
<div class="one border-[1px] w-full p-[10px]">
    <img src="./public/hanghoa/img/{{ $item['hinh'] }}" alt="" width="20px" height="20px">
    <a href="./index.php?url=ct&id={{$item['ma_hh']}}" class="ml-[15px] text-gray-800 hover:text-red-500">{{ $item['ten_hh'] }}</a>
</div>
@endforeach
