<div class="rowheader"><h1>Thêm mới hàng hóa</h1></div>
<div class="row-content">
    <form action="./BE.php?url=createProduct" method="post" enctype="multipart/form-data">
        <div class="content-text">
            <label for="">Mã hàng hóa</label>
        </div>
        <input type="text" name="mahh" disabled>
        <br>
        <div class="content-text">
            <label for="">Tên hàng hóa</label>
        </div>
        <input type="text" name="tenhh">
        <br>
        <div class="content-text">
            <label for="">Đơn giá</label>
        </div>
        <input type="number" name="giahh">
        <br>
        <div class="content-text">
            <label for="">Giảm giá</label>
        </div>
        <input type="number" name="giamgia">
        <br>
        <div class="content-text">
            <label for="">Hình ảnh</label>
        </div>
        <input type="file" name="img">
        <br>
        <div class="content-text">
            <label for="">Ngày nhập</label>
        </div>
        <input type="date" name="ngay">
        <br>
        <div class="content-text">
            <label for="">Mô tả</label>
        </div>
        <input type="text" name="mota">
        <br>
        <div class="content-text">
            <label for="">Đặc biệt</label>
        </div>
        <input type="number" name="dacbiet">
        <br>
        <div class="content-text">
            <label for="">Số lượt xem</label>
        </div>
        <input type="number" name="luotxem">
        <br>
        <div class="content-text">
            <label for="">Mã loại</label>
        </div>
        <select name="chon" id="">
            <option value="">---Chọn---</option>
                @foreach($data as $item)

                <option value="{{$item['ma_loai']}}">{{$item['ma_loai']}} - {{$item['ten_loai']}}</option>
                @endforeach
        </select>
        <br>
        <br>
        <div class="but">
            <button type="submit" name="btn" style="width: 100px;height: 30px;border-radius: 5px 5px 5px 5px; font-weight: 700">Thêm mới</button>
            <input type="reset" value="Nhập lại" style="width: 100px;height: 30px;border-radius: 5px 5px 5px 5px; font-weight: 700; margin-left: 10px ">
            <a href="danhsach_hanghoa.php"><input type="button" value="Danh sách"></a>
        </div>

    </form>
</div>