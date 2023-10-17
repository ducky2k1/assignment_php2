
<div class="text-mid w-full flex justify-center bg-[#37A9CD] rounded-[4px] items-center h-[50px]">
    <h1 class="font-bold text-[20px] text-[#ffff] ">SẢN PHẢM</h1>
</div>
<div class="row w-full mt-[10px]">
    @foreach($data as $item)
    <div class="boxsp " style="margin: 5px 5px;">
        <a href="./index.php?url=ct&id={{$item['ma_hh']}}">
            <div class="img flex justify-center">
                <img src="./public/hanghoa/img/{{$item['hinh']}}" alt="" style="width:150px;height:150px;">
            </div>
            <p class="mt-[10px] mb-[5px] flex justify-center items-center">{{ $item['don_gia'] }} $</p>
            <a href="./index.php?url=c&id={{$item['ma_hh']}}t" class="flex justify-center items-center text-[black] font-semibold">
                {{ $item['ten_hh'] }}
            </a>
        </a>
    </div>
    @endforeach
</div>