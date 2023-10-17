<?php

namespace Trinhduc\AssignPhp2\Controllers\Product;

use eftec\bladeone\BladeOne;
use Trinhduc\AssignPhp2\DBconnection;

class type
{
    public static function showCreateLoai(){
        $view  = './app/Views/BE/showCreate'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showCreateLoai');
    }
    public static function createLoai(){
            $nameType = $_POST['tenloai'];
            $errer = [];
            if (empty($nameType)) {
                echo "<script>alert('Tên loại không được để trống!!!');</script>";
                header("Refresh: 3; URL=BE.php?url=showCreateLoai");
                die();
            }
            if (empty($errer)){
                $sql = 'INSERT INTO `loai`(`ten_loai`) VALUES (?)';
                $db = new DBConnection();
                $connect = $db->connect();
                $stmp = $connect->prepare($sql);
                $stmp->bindParam(1, $nameType, \PDO::PARAM_STR);
                if ($stmp->execute()) {
                    echo "<script>alert('Thêm mới loại hàng thành công.');</script>";
                    header("Refresh: 3; URL=BE.php");
                } else {
                    echo 'Co loi xay ra, vui long kiem tra lai.';
                }
            }
    }

    public static function deleteLoai(){
        $ma_loai = $_GET['ma_loai'];
        $sql = "DELETE FROM `loai` WHERE ma_loai=?";
        $db = new DBConnection();
        $connect = $db->connect();
        $stmp = $connect->prepare($sql);
        $stmp->bindParam(1, $ma_loai, \PDO::PARAM_STR);
        if ($stmp->execute()) {

            header("Refresh: 0; URL=BE.php");
        } else {
            echo 'Co loi xay ra, vui long kiem tra lai.';
        }

    }

    public static function showEditLoai(){
        $ma = $_GET['id'];
        $sql="SELECT * FROM `loai` WHERE ma_loai=?";
        $db = new DBConnection();
        $conn = $db->connect();
        $stmp3 = $conn->prepare($sql);
        $stmp3->bindParam(1, $ma);
        $stmp3->execute();

        $data = $stmp3->fetch(\PDO::FETCH_ASSOC);
        $view  = './app/Views/BE/showEdit'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showEditLoai',$data);
    }

    public static function updateLoai(){
        $ma = $_GET['id'];
        $ten = $_POST['tenloai'];

        $sql="UPDATE `loai` SET `ten_loai`=? WHERE ma_loai=?";
        $db = new DBConnection();
        $conn = $db->connect();
        $stmp3 = $conn->prepare($sql);
        $stmp3->bindParam(1, $ten);
        $stmp3->bindParam(2, $ma);
        if ($stmp3->execute()) {
            echo "<script>alert('Sửa thành công.');</script>";
            header("Refresh: 3; URL=BE.php");
        } else {
            echo 'Co loi xay ra, vui long kiem tra lai.';
        }
    }

}