<div class="rowheader"><h1>Danh sách loại hàng</h1></div>
<div class="row-content">
    <form action="" method="post">
        <div class="tab">
            <table>
                <thead>
                <tr>
                    <th></th>
                    <th>Mã hàng hóa</th>
                    <th>Tên hàng hóa</th>
                    <th>Đơn giá</th>
                    <th>Giảm giá</th>
                    <th>Hình ảnh</th>
                    <th>Ngày nhập</th>
                    <th>Mô tả</th>
                    <th>Đặc biệt</th>
                    <th>Số lượt xem</th>
                    <th>Mã loại</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)

                    <tr>
                        <td><input type="checkbox" name="name[]" id="check_all"></td>
                        <td align="center">{{$item['ma_hh']}}</td>
                        <td align="center">{{$item['ten_hh']}}</td>
                        <td align="center">{{$item['don_gia']}}</td>
                        <td align="center">{{$item['giam_gia']}}</td>
                        <td align="center"><img src="./public/hanghoa/img/{{ $item['hinh'] }}" alt="" style="width:100px; height:100px;"></td>
                        <td align="center">{{$item['ngay_nhap']}}</td>
                        <td align="center">{{$item['mo_ta']}}</td>
                        <td align="center">{{$item['dac_biet']}}</td>
                        <td align="center">{{$item['so_luot_xem']}}</td>
                        <td align="center">{{$item['ma_loai']}} - {{$item['ten_loai']}}</td>

                        <td style="display:flex;justify-content: center;align-items: center;">
                            <a href="edit_hanghoa.php?ma_hh={{$item['ma_hh']}}"><input type="button" value="Sửa" style="width:60px"></a>

                            <a href="danhsach_hanghoa.php?ma_hh={{$item['ma_hh']}}" onclick="return confirm('Bạn có chắc xóa không')">
                                <input type="button" value="Xóa" style="width:60px">
                            </a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        <div class="but">
            <input type="button" value="Chọn tất cả" id="btn1">
            <input type="button" value="Bỏ chọn tất cả" id="btn2">
            <input type="button" value="Xóa các mục đã chọn">
            <a href="admin.php"><input type="button" value="Nhập thêm"></a>
        </div>

    </form>
</div>

