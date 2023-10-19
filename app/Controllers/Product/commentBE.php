<?php

namespace Trinhduc\AssignPhp2\Controllers\Product;

use Trinhduc\AssignPhp2\DBconnection;

class commentBE
{
    public static function deleteComment(){
        $ma = $_GET['ma_bl'];
        $sql = "DELETE FROM `binh_luan` WHERE ma_bl=?";
        $db = new DBConnection();
        $connect = $db->connect();
        $stmp = $connect->prepare($sql);
        $stmp->bindParam(1, $ma, \PDO::PARAM_STR);
        if ($stmp->execute()) {
            header("Refresh: 0; URL=BE.php?url=bl");
        } else {
            echo 'Co loi xay ra, vui long kiem tra lai.';
        }
    }
    public static function confirm(){
        $ma = $_GET['ma_bl'];
        $sql = "UPDATE `binh_luan` SET `status` = 'đã duyệt' WHERE `binh_luan`.`ma_bl` = ?";
        $db = new DBConnection();
        $connect = $db->connect();
        $stmp = $connect->prepare($sql);
        $stmp->bindParam(1, $ma, \PDO::PARAM_STR);
        if ($stmp->execute()) {
            header("Refresh: 0; URL=BE.php?url=bl");
        } else {
            echo 'Co loi xay ra, vui long kiem tra lai.';
        }


    }
}