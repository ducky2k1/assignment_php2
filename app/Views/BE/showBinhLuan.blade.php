<div class="rowheader"><h1>Danh sách bình luận</h1></div>
<div class="row-content">
    <form action="" method="post">
        <div class="tab">
            <table>
                <thead>
                <tr>
                    <th></th>
                    <th>Mã bình luận</th>
                    <th>Nội dung</th>
                    <th>Mã hàng hóa</th>
                    <th>Mã khách hàng</th>
                    <th>Ngày bình luận</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)

                    <tr>
                        <td><input type="checkbox" name="name[]" id="check_all"></td>
                        <td align="center">{{$item['ma_bl']}}</td>
                        <td align="center">{{$item['noi_dung']}}</td>
                        <td align="center">{{$item['ma_hh']}}</td>
                        <td align="center">{{$item['ma_kh']}} - {{$item['fullname']}}</td>
                        <td align="center">{{$item['ngay_bl']}}</td>
                        <td align="center" style="
                        @if($item['status']=='chưa duyệt')
                            color:red;
                        @else
                            color: green;
                        @endif
                        ">{{$item['status']}}</td>
                        <td style="display:flex;justify-content: center;align-items: center;">
                            @if($item['status']=='chưa duyệt')
                                <a href="BE.php?url=confirm&ma_bl={{$item['ma_bl']}}"><input type="button" value="Duyệt" style="width:60px"></a>
                            @else

                            @endif

                            <a href="BE.php?url=deleteComment&ma_bl={{$item['ma_bl']}}" onclick="return confirm('Bạn có chắc xóa không')">
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
            <input type="button" value="Xóa mục đã chọn">
        </div>

    </form>
</div>
