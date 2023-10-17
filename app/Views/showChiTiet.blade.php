
<div class="boxleft w-full">


    <div class="text-mid w-full flex justify-center bg-[#37A9CD] rounded-[4px] items-center h-[50px]">
        <a href=""><h1 class="font-bold text-[20px] text-[#ffff] ">Chi tiết sản phẩm</h1></a>
    </div>
    <div class="productt flex " style="">
        <div class="w-full border-[1px] flex items-center justify-center" style="">
            <img src="./public/hanghoa/img/{{$data['hanghoa']['hinh']}}" alt="" style="width:400px;height:230px;">

            <ul class="p-[20px] ml-[100px]">
                <li class="text-[16px] font-[500] my-[20px]">Mã hàng hóa: {{$data['hanghoa']['ma_hh']}} - {{$data['hanghoa']['ten_loai']}}  </li>
                <li class="text-[16px] font-[500] my-[20px]">Tên hàng hóa: {{$data['hanghoa']['ten_hh']}}</li>
                <li class="text-[16px] font-[500] my-[20px]">Đơn giá: {{$data['hanghoa']['don_gia']}} $</li>
                <li class="text-[16px] font-[500] my-[20px]">Giảm giá: {{$data['hanghoa']['giam_gia']}}%</li>
                <li class="text-[16px] font-[500] my-[20px]">{{$data['hanghoa']['mo_ta']}}</li>
                <li class="text-[16px] font-[500] my-[20px]">Lượt xem: {{$data['hanghoa']['so_luot_xem']}}</li>
                @if(!isset($_SESSION['login']))
                    <li class="text-[16px] font-[500] my-[20px] text-red-500">Bạn phải đăng nhập để mua hàng hoặc bình luận!</li>
                @else
                <li>
                    <a href="#" class="font-semibold text-[14px]  w-full flex justify-center my-[20px]">
                    <button class="bg-[#37A9CD] hover:bg-sky-700 rounded-[20px] w-[150px] h-[30px] text-white">Mua hàng</button>
                    </a>
                </li>
                @endif
            </ul>

        </div>
    </div>
    <div class="w-full">
        <h2 class="bg-[#37A9CD] w-full flex justify-center items-center h-[30px] text-[18px] text-white">Bình luận</h2>
        <div class="border-[1px] p-[15px]">
            <?php foreach($data['comment'] as $dst){ ?>

            <div class="relative grid grid-cols-1 gap-4 p-4 mb-8 border rounded-lg bg-white shadow-lg">
                <div class="relative flex gap-4">
                    <img src="./public/img_upload/{{$dst['hinh']}}" class="relative rounded-lg -top-8 -mb-4 bg-white border h-20 w-20" alt="" loading="lazy">
                    <div class="flex flex-col w-full">
                        <div class="flex flex-row justify-between">
                            <p class="relative text-xl whitespace-nowrap truncate overflow-hidden">{{$dst['fullname']}}</p>
                        </div>
                        <p class="text-gray-400 text-sm">{{$dst['ngay_bl']}}</p>
                    </div>
                </div>
                <p class="-mt-4 text-gray-500">{{$dst['noi_dung']}}</p>
            </div>
            <?php } ?>

        </div>
    </div>


    <div class="comment">
        @if(isset($_SESSION['login']))
        <form action="./comment.php?url=add&id={{$data['hanghoa']['ma_hh']}}" method="post">
            <textarea name="cmt" id="" cols="30" rows="10" class="w-full border-[2px] p-[25px]"></textarea>
            <div class="w-full flex justify-center">
                <input type="submit" value="Bình luận" name="bl" class="bg-sky-500 hover:bg-sky-700 text-white w-[150px] h-[30px] rounded-[5px]">
            </div>

        </form>
        @endif
    </div>

    <div class="">

    </div>
</div>



