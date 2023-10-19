<div class="rowheader"><h1>Sửa hàng hóa</h1></div>
<div class="row-content">
    <form action="./BE.php?url=updateProduct&id={{$product['ma_hh']}}" method="post" enctype="multipart/form-data">
        <div class="content-text">
            <label for="">Mã hàng hóa</label>
        </div>
        <input type="text" name="mahh" disabled value="{{$product['ma_hh']}}">
        <br>
        <div class="content-text">
            <label for="">Tên hàng hóa</label>
        </div>
        <input type="text" name="tenhh" value="{{$product['ten_hh']}}">
        <br>
        <div class="content-text">
            <label for="">Đơn giá</label>
        </div>
        <input type="number" name="giahh" value="{{$product['don_gia']}}">
        <br>
        <div class="content-text">
            <label for="">Giảm giá</label>
        </div>
        <input type="number" name="giamgia" value="{{$product['giam_gia']}}}">
        <br>
        <div class="content-text">
            <label for="">Hình ảnh</label>
        </div>
        <img src="./public/hanghoa/img/
                @if(isset($_POST['btn']))
                {{$_POST['img']}}
                @else
                {{$product['hinh']}}
                @endif
        " alt="" width="150px">
        <input type="hidden" name="img" value="
                @if(isset($_POST['btn']))
                {{$_POST['img']}}
                @else
                {{$product['hinh']}}
                @endif
        ">
        <input type="file" name="anh" id="">
        <br>
        <div class="content-text">
            <label for="">Ngày nhập</label>
        </div>
        <input type="date" name="ngay" value="{{$product['ngay_nhap']}}">
        <br>
        <div class="content-text">
            <label for="">Mô tả</label>
        </div>
        <input type="text" name="mota" value="{{$product['mo_ta']}}">
        <br>
        <div class="content-text">
            <label for="">Đặc biệt</label>
        </div>
        <input type="number" name="dacbiet" value="{{$product['dac_biet']}}">
        <br>
        <div class="content-text">
            <label for="">Số lượt xem</label>
        </div>
        <input type="number" name="luotxem" value="{{$product['so_luot_xem']}}">
        <br>
        <div class="content-text">
            <label for="">Mã loại</label>
        </div>
        <select name="chon" id="">
            <option value="">{{$product['ma_loai']}}</option>
            @foreach($type as $ds)

            <option value="{{$ds['ma_loai']}}">{{$ds['ma_loai']}} - {{$ds['ten_loai']}}</option>
            @endforeach


        </select>
        <br>
        <br>
        <div class="but">
            <button type="submit" name="btn">Sửa</button>
            <a href="BE.php?url=hh" class=""><input type="button" value="Danh sách"></a>

        </div>

    </form>
</div>