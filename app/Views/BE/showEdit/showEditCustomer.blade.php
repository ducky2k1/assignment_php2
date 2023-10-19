<div class="rowheader"><h1>Sửa USER</h1></div>
<div class="row-content">
    <h5 class=""><?php if (isset($thongbao) && ($thongbao != ""))  {
            echo $thongbao;
        } else {
            echo "Đang sửa tài khoản";
        } ?></h5>
    <form action="./BE.php?url=updateCustomer&id={{$customer['ma_us']}}" method="post" enctype="multipart/form-data">
        <div class="content-text">
            <label for="">Họ và tên</label>
        </div>
        <input name="fullname" value="{{$customer['fullname']}}" class="" type="text">
        <span class=""><?= $errer['fullname'] ?? "" ?></span>
        <br>
        <div class="content-text">
            <label for="" >Email</label>
        </div>
        <input name="email" value="{{$customer['email']}}" class="" type="email">
        <span class=""><?= $errer['danhmuc'] ?? "" ?></span>
        <br>
        <div class="content-text">
            <label for="" >Mật khẩu</label>
        </div>
        <input name="password" value="{{$customer['password']}}" class="" type="text">
        <span class=""><?= $errer['password'] ?? "" ?></span>
        <br>
        <div class="content-text">
            <label for="" >Hình ảnh</label>
        </div>
        <img src="./public/img_upload/{{$customer['hinh']}}" alt="" class="" style="width:50px;height:50px;">
        <input type="hidden" name="img" value="{{$customer['hinh']}}">
        <input name="anh" class="" type="file">
        <span class=""><?= $errer['img'] ?? "" ?></span>
        <br>
        <div class="content-text">
            <label for="" >Địa chỉ</label>
        </div>
        <input name="location" value="{{$customer['location']}}" class="" type="text">
        <span class=""><?= $errer['location'] ?? "" ?></span>
        <br>
        <div class="content-text">
            <label for="" ></label>
        </div>
        <br>
        <br>
        <div class="but">
            <button type="submit">Cập nhật</button>
            <button type="reset" style="margin-left: 10px">Nhập lại</button>
            <input type="hidden" name="ma_us" value="<?= $customer['ma_us'] ?? "" ?>">
            <a href="BE.php?url=kh" class=""><input type="button" value="Danh sách"></a>

        </div>

    </form>
</div>