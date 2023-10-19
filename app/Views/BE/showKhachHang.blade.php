<div class="rowheader"><h1>Danh sách khách hàng</h1></div>
<div class="row-content">
    <form action="" method="post">
        <div class="tab">
            <table>
                <thead>
                <tr>
                    <th></th>
                    <th>Mã khách hàng</th>
                    <th>Họ và tên</th>
                    <th>Email</th>
                    <th>Mật khẩu</th>
                    <th>Hình</th>
                    <th>Địa chỉ</th>
                    <th>Quyền</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)

                    <tr>
                        <td><input type="checkbox" name="name[]" id="check_all"></td>
                        <td>{{$item['ma_us']}}  </td>
                        <td>{{$item['fullname']}} </td>
                        <td>{{$item['email']}} </td>
                        <td>{{$item['password']}} </td>
                        <td><img src="./public/img_upload/{{$item['hinh']}}" alt="" class="h-10 w-10" style="width:100px;"></td>
                        <td> {{$item['location']}}</td>
                        <td>{{$item['role']}} </td>
                        <td style="display:flex;justify-content: center;align-items: center; width: 100%">
                            <a href="BE.php?url=showEditCustomer&id={{$item['ma_us']}}"><input type="button" value="Sửa" style="width:60px"></a>

                            <a href="BE.php?url=deleteUser&id={{$item['ma_us']}}" onclick="return confirm('Bạn có chắc xóa không')">
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
            <a href="BE.php?url=showCreateCustomer"><input type="button" value="Nhập thêm"></a>
        </div>

    </form>
</div>
