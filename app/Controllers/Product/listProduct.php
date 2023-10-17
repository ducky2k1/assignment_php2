<?php

namespace Trinhduc\AssignPhp2\Product;
use Trinhduc\AssignPhp2\DBconnection;
use eftec\bladeone\BladeOne;
class listProduct
{
    public static function showLoai(){
        $sql = 'SELECT * FROM `loai`';
        $db = new DBconnection();
        $conn = $db->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $view  = './app/Views/BE'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showLoai',['data' => $data]);
    }
    public static function showHangHoa(){
        $sql = 'SELECT * FROM `hang_hoa`';
        $db = new DBconnection();
        $conn = $db->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $view  = './app/Views/BE'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showHangHoa',['data' => $data]);
    }
    public static function showKhachHang(){
    $sql = 'SELECT * FROM `user`';
    $db = new DBconnection();
    $conn = $db->connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    $view  = './app/Views/BE'; // dinh nghia thu muc chia view!
    $cache = './storage'; // thu muc cache cho bladeone
    $blade = new BladeOne($view,$cache);
    echo $blade->run('showKhachHang',['data' => $data]);
    }
    public static function showBinhLuan(){
        $sql = 'SELECT * FROM `binh_luan`';
        $db = new DBconnection();
        $conn = $db->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $view  = './app/Views/BE'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showBinhLuan',['data' => $data]);
    }
}