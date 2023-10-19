<?php

namespace Trinhduc\AssignPhp2\Controllers\Product;
session_start();

use Trinhduc\AssignPhp2\DBconnection;

class commentProduct
{
    public static function addComment(){
        $ma_hh = $_GET['id'];
        $date = date('Y-m-d');
        $comment = $_POST['cmt'];
        $ma_us = $_SESSION['login']['id'];
        $sql="INSERT INTO `binh_luan`(`noi_dung`, `ma_hh`, `ma_kh`, `ngay_bl`,`status`) VALUES (?,?,?,?,'chưa duyệt') ";
        $db = new DBConnection();
        $connect = $db->connect();
        $stmp = $connect->prepare($sql);
        $stmp->bindParam(1, $comment, \PDO::PARAM_STR);
        $stmp->bindParam(2, $ma_hh, \PDO::PARAM_STR);
        $stmp->bindParam(3, $ma_us, \PDO::PARAM_STR);
        $stmp->bindParam(4, $date, \PDO::PARAM_STR);
        if ($stmp->execute()) {
            echo "<script>alert('Bình luận thành công! Vui lòng chờ xác nhận từ quản trị viên.');</script>";
            header("Refresh: 3; URL=index.php?url=ct&id=$ma_hh");
        } else {
            echo 'Co loi xay ra, vui long kiem tra lai.';
        }
    }
}