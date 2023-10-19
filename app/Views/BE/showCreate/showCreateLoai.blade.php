<style>
    .content-text{
        background-color: rgb(210, 208, 208);
        height: 30px;
        display: flex;
        align-items: center;

    }
    label{
        margin: 0 15px;
        font-weight: 600;
    }
    input[type="text"]{
        height: 25px;
        width: 100%;
        margin: 0px 0px;
        border: 1px solid black;
    }
    .rowheader{
        height: 40px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color:#fff;
    }
    .but{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    input[type="submit"],input[type="reset"],input[type="button"]{
        margin: 0 10px;
        width: 100px;
        height: 30px;
        border-radius: 5px 5px 5px 5px;
        font-weight: 700;
    }
    input[type="submit"]:hover,input[type="reset"]:hover,input[type="button"]:hover{
        background-color: burlywood;
        color: #fff;
        font-weight: 700;
    }
</style>
<div class="rowheader"><h1>Thêm mới loại hàng hóa</h1></div>
    <div class="row-content">
        <form action="./BE.php?url=createLoai" method="post" enctype="multipart/form-data">
            <div class="content-text">
                <label for="">Mã loại</label>
            </div>
            <input type="text" name="maloai" disabled>
            <br>
            <div class="content-text">
                <label for="">Tên loại</label>
            </div>
            <input type="text" name="tenloai">
            <span style="color: red;">

                <?= $errer['nameType'] ?? "" ?>

            </span>

            <br>
            <br>
            <div class="but">
                <button type="submit" name="them" style="width: 100px;height: 30px;border-radius: 5px 5px 5px 5px; font-weight: 700">Thêm mới</button>
                <input type="reset" value="Nhập lại">
                <a href="./BE.php"><input type="button" value="Danh sách"></a>
            </div>

        </form>
    </div>
</div>
