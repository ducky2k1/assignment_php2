<?php
namespace Trinhduc\AssignPhp2\Product;
//require './app/DBConnection.php';

use Trinhduc\AssignPhp2\DBconnection;
use eftec\bladeone\BladeOne;
class product
{
    public static function showTop10(){
        $sql = 'SELECT * FROM `hang_hoa` order by so_luot_xem desc limit 0,10';
        $db = new DBconnection();
        $conn = $db->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $view  = './app/Views'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showTop10',['data' => $data]);
    }
    public static function showChiTiet(){
        $ma_hh = $_GET['id'];
        $sql = 'SELECT * FROM `loai`';
        $db = new DBconnection();
        $conn = $db->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $sql2="SELECT * FROM `hang_hoa` JOIN `binh_luan` on `hang_hoa`.`ma_hh`=`binh_luan`.`ma_hh` JOIN `user` on `binh_luan`.`ma_kh`=`user`.`ma_us` WHERE `hang_hoa`.`ma_hh`=?";
        $stmp2 = $conn->prepare($sql2);
        $stmp2->bindParam(1, $ma_hh);
        $stmp2->execute();

        $sql3="SELECT * FROM `hang_hoa` join `loai` on `hang_hoa`.`ma_loai`=`loai`.`ma_loai` WHERE ma_hh=?";
        $stmp3 = $conn->prepare($sql3);
        $stmp3->bindParam(1, $ma_hh);
        $stmp3->execute();

        $sql4="UPDATE hang_hoa set so_luot_xem=so_luot_xem+1 where ma_hh=$ma_hh";
        $stmt2 = $conn->prepare($sql4);
        $stmt2->execute();
        $data = [
            'loai'=>$stmt->fetchAll(\PDO::FETCH_ASSOC),
            'comment'=>$stmp2->fetchAll(\PDO::FETCH_ASSOC),
            'hanghoa'=>$stmp3->fetch(\PDO::FETCH_ASSOC)
        ];
        $view  = './app/Views'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showChiTiet',['data' => $data]);
    }
    public static function showAll(){
        $sql = 'SELECT * FROM `hang_hoa` JOIN `loai` ON `hang_hoa`.`ma_loai`=`loai`.`ma_loai` LIMIT 0,9';
        $db = new DBconnection();
        $conn = $db->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $view  = './app/Views'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showAll',['data' => $data]);
    }
    public static function showDH(){
        $sql = 'SELECT * FROM `hang_hoa` JOIN `loai` ON `hang_hoa`.`ma_loai`=`loai`.`ma_loai` WHERE `loai`.`ma_loai`=25';
        $db = new DBconnection();
        $conn = $db->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $view  = './app/Views'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showAll',['data' => $data]);
    }
    public static function showDT(){
        $sql = 'SELECT * FROM `hang_hoa` JOIN `loai` ON `hang_hoa`.`ma_loai`=`loai`.`ma_loai` WHERE `loai`.`ma_loai`=28';
        $db = new DBconnection();
        $conn = $db->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $view  = './app/Views'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showAll',['data' => $data]);
    }
    public static function showLT(){
        $sql = 'SELECT * FROM `hang_hoa` JOIN `loai` ON `hang_hoa`.`ma_loai`=`loai`.`ma_loai` WHERE `loai`.`ma_loai`=26';
        $db = new DBconnection();
        $conn = $db->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $view  = './app/Views'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showAll',['data' => $data]);
    }
    public static function showMA(){
    $sql = 'SELECT * FROM `hang_hoa` JOIN `loai` ON `hang_hoa`.`ma_loai`=`loai`.`ma_loai` WHERE `loai`.`ma_loai`=27';
    $db = new DBconnection();
    $conn = $db->connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    $view  = './app/Views'; // dinh nghia thu muc chia view!
    $cache = './storage'; // thu muc cache cho bladeone
    $blade = new BladeOne($view,$cache);
    echo $blade->run('showAll',['data' => $data]);
}

}