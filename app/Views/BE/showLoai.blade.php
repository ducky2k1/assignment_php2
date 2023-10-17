<div class="rowheader"><h1>Danh sách loại hàng</h1></div>
<div class="row-content">
    <form action="" method="post">
        <div class="tab">
            <table>
                <thead>
                <tr>
                    <th></th>
                    <th>Mã loại</th>
                    <th>Tên loại</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)

                    <tr>
                        <td><input type="checkbox" name="name[]" id="check_all"></td>
                        <td align="center">{{$item['ma_loai']}}</td>
                        <td align="center">{{$item['ten_loai']}}</td>
                        <td style="display:flex;justify-content: center;align-items: center;">
                            <a href="BE.php?url=showEditLoai&id={{$item['ma_loai']}}"><input type="button" value="Sửa" style="width:60px"></a>

                            <a href="BE.php?url=deleteLoai&ma_loai={{$item['ma_loai']}}" onclick="return confirm('Bạn có chắc xóa không')">
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
            <a href="./BE.php?url=showCreateLoai"><input type="button" value="Nhập thêm"></a>
        </div>

    </form>
</div>
