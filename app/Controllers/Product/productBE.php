<?php

namespace Trinhduc\AssignPhp2\Controllers\Product;
use eftec\bladeone\BladeOne;
use Trinhduc\AssignPhp2\DBconnection;
class productBE
{
    public static function deleteProduct(){
        $ma_hh = $_GET['ma_hh'];
        $sql = "DELETE FROM `hang_hoa` WHERE ma_hh=?";
        $db = new DBConnection();
        $connect = $db->connect();
        $stmp = $connect->prepare($sql);
        $stmp->bindParam(1, $ma_hh, \PDO::PARAM_STR);
        if ($stmp->execute()) {

            header("Refresh: 1; URL=BE.php?url=hh");
        } else {
            echo 'Co loi xay ra, vui long kiem tra lai.';
        }
    }

    public static function showCreateProduct(){
        $sql = "SELECT * FROM `loai`";
        $db = new DBConnection();
        $conn = $db->connect();
        $stmp3 = $conn->prepare($sql);
        $stmp3->execute();
        $data = $stmp3->fetchAll(\PDO::FETCH_ASSOC);
        $view  = './app/Views/BE/showCreate'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showCreateProduct',['data' => $data]);
    }

    public static function createProduct(){
        $name=$_POST['tenhh'];

        $price=$_POST['giahh'];

        $sale=$_POST['giamgia'];


        $typeAllow=['png','jpg'];
        $typeFile=pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);


        $dir='./public/hanghoa/img/';
        $upload=$dir.$_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], $upload);


        $date=$_POST['ngay'];

        $describe=$_POST['mota'];

        $special=$_POST['dacbiet'];

        $view=$_POST['luotxem'];

        $choose=$_POST['chon'];

//        $nameType = $_POST['tenloai'];
        $errer = [];
//        if (empty($nameType)) {
//            echo "<script>alert('Tên loại không được để trống!!!');</script>";
//            header("Refresh: 3; URL=BE.php?url=showCreateLoai");
//            die();
//        }
        if (empty($errer)){
            $sql = 'INSERT INTO `hang_hoa`(`ten_hh`, `don_gia`, `giam_gia`, `hinh`, `ngay_nhap`, `mo_ta`, `dac_biet`, `so_luot_xem`, `ma_loai`) VALUES (?,?,?,?,?,?,?,?,?)';
            $db = new DBConnection();
            $connect = $db->connect();
            $stmp = $connect->prepare($sql);
            $stmp->bindParam(1, $name, \PDO::PARAM_STR);
            $stmp->bindParam(2, $price, \PDO::PARAM_STR);
            $stmp->bindParam(3, $sale, \PDO::PARAM_STR);
            $stmp->bindParam(4, $_FILES['img']['name'], \PDO::PARAM_STR);
            $stmp->bindParam(5, $date, \PDO::PARAM_STR);
            $stmp->bindParam(6, $describe, \PDO::PARAM_STR);
            $stmp->bindParam(7, $special, \PDO::PARAM_STR);
            $stmp->bindParam(8, $view, \PDO::PARAM_STR);
            $stmp->bindParam(9, $choose, \PDO::PARAM_STR);
            if ($stmp->execute()) {
                echo "<script>alert('Thêm mới hàng hóa thành công.');</script>";
                header("Refresh: 3; URL=BE.php?url=hh");
            } else {
                echo 'Co loi xay ra, vui long kiem tra lai.';
            }
        }
    }

    public static function showEditProduct(){
        $ma = $_GET['id'];
        $sql="SELECT * FROM `hang_hoa` WHERE ma_hh=?";
        $db = new DBConnection();
        $conn = $db->connect();
        $stmp3 = $conn->prepare($sql);
        $stmp3->bindParam(1, $ma);
        $stmp3->execute();


        $sql="SELECT * FROM `loai`";
        $db = new DBConnection();
        $conn = $db->connect();
        $stmp = $conn->prepare($sql);
        $stmp->execute();

        $data = [
            'product'=>$stmp3->fetch(\PDO::FETCH_ASSOC),
            'type'=>$stmp->fetchAll(\PDO::FETCH_ASSOC)
        ];
        $view  = './app/Views/BE/showEdit'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showEditProduct',$data);
    }

    public static function updateProduct(){
        $ma = $_GET['id'];
        $name=$_POST['tenhh'];
        $price=$_POST['giahh'];
        $sale=$_POST['giamgia'];

        $anh=$_POST['img'];
        $anh_moi = $_FILES['anh'];
        $errer = [];

        $dir='./public/hanghoa/img/';


        $date=$_POST['ngay'];
        $describe=$_POST['mota'];
        $special=$_POST['dacbiet'];
        $view=$_POST['luotxem'];
        $choose=$_POST['chon'];

        if ($anh_moi['size'] > 0) {
            $duoianh = ['jpg', 'png', 'jpeg', 'gif'];
            $duoi = pathinfo($anh_moi['name'], PATHINFO_EXTENSION);
            if (!in_array($duoi, $duoianh)) {
                echo 'File không phải là ảnh';
            } else {
                $img = $anh_moi['name'];
            }
        } else {
            $img = $anh;
        }
        if (empty($errer)) {
            move_uploaded_file($anh_moi['tmp_name'], $dir . $img);
            $sql = 'UPDATE `hang_hoa` SET `ten_hh`=?,`don_gia`=?,`giam_gia`=?,`hinh`=?,`ngay_nhap`=?,`mo_ta`=?,`dac_biet`=?,`so_luot_xem`=?,`ma_loai`=? WHERE ma_hh =?';
            $db = new DBConnection();
            $connect = $db->connect();
            $stmp = $connect->prepare($sql);
            $stmp->bindParam(1, $name, \PDO::PARAM_STR);
            $stmp->bindParam(2, $price, \PDO::PARAM_STR);
            $stmp->bindParam(3, $sale, \PDO::PARAM_STR);
            $stmp->bindParam(4, $img, \PDO::PARAM_STR);
            $stmp->bindParam(5, $date, \PDO::PARAM_STR);
            $stmp->bindParam(6, $describe, \PDO::PARAM_STR);
            $stmp->bindParam(7, $special, \PDO::PARAM_STR);
            $stmp->bindParam(8, $view, \PDO::PARAM_STR);
            $stmp->bindParam(9, $choose, \PDO::PARAM_STR);
            $stmp->bindParam(10, $ma, \PDO::PARAM_STR);
            if ($stmp->execute()) {
                echo "<script>alert('Sửa thành công.');</script>";
                header("Refresh: 3; URL=BE.php?url=hh");
            } else {
                echo 'Co loi xay ra, vui long kiem tra lai.';
            }
        }



    }

}