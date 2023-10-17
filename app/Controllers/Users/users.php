<?php

namespace Trinhduc\AssignPhp2\Users;
session_start();
//require './app/DBConnection.php';

use Trinhduc\AssignPhp2\DBconnection;
use eftec\bladeone\BladeOne;

class users
{
    public static function showIconLogin(){
        $view  = './app/Views'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showIconLogin');
    }

    //show form đăng nhập
    public static function showLogin(){
        $view  = './app/Views'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showLogin');
    }
    //Xử lý đăng nhập
    public static function login(){
        // xu ly viec login
        $mail = $_POST['email'];
        $password = $_POST['password'];
        $error = [];
//        if (empty($username) || empty($password)) {
//            // mở file index.php với tham số đi kèm
//            header("location:login.php?url=showLogin&error=empty");
//            return;
//        }
        // mo ket noi , query username. ....
        $sql = 'Select * from user where email = :username';
        $db = new DBConnection();
        $conn = $db->connect();
        $stmp = $conn->prepare($sql);
        $stmp->bindParam(":username", $mail);
        $stmp->execute();
        $row = $stmp->fetch(\PDO::FETCH_ASSOC);

        if ($row) {
            if ($password = $row['password']) {

                $_SESSION['login'] = [
                    'fullname'=> $row['fullname'],
                    'location'=> $row['location'],
                    'email'=> $row['email'],
                    'role'=> $row['role'],
                    'img'=> $row['hinh'],
                    'id'=> $row['ma_us'],
                    'password'=> $row['password']
                ];


               header("location: index.php");

            }
        } else {
            echo "Login KHONG Thanh Cong . ";
        }
    }

    //Đăng xuất
    public static function logout(){
        unset($_SESSION['username']); // xoa username khoi phien
        session_destroy(); // destroy
        // ket thuc phien dang nhap
        header("location:index.php");
    }

    //show ra thôn tin người dùng
    public static function showInfo(){
        $data = ['fullname'=>$_SESSION['login']['fullname'],
            'location'=>$_SESSION['login']['location'],
            'email'=>$_SESSION['login']['email'],
            'role'=>$_SESSION['login']['role'],
            'img'=>$_SESSION['login']['img'],
            'id'=>$_SESSION['login']['id'],
            'password'=>$_SESSION['login']['password']];
        $view  = './app/Views'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showInfo',$data);
    }

    //Show ra form chỉnh sửa thông tin người dùng
    public static function showEdit(){
        $data = ['fullname'=>$_SESSION['login']['fullname'],
            'location'=>$_SESSION['login']['location'],
            'email'=>$_SESSION['login']['email'],
            'role'=>$_SESSION['login']['role'],
            'img'=>$_SESSION['login']['img'],
            'id'=>$_SESSION['login']['id'],
            'password'=>$_SESSION['login']['password']
        ];
        $view  = './app/Views'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showEdit',$data);
    }
// Cập nhật tài khoản
    public static function update(){
        if (isset($_POST['up']) && ($_POST['up'])){
            $ma_us = $_SESSION['login']['id'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $anh = $_POST['img'];
            $anh_moi = $_FILES['anh'];
            $location = $_POST['location'];
            $errer = [];

            if ($anh_moi['size'] > 0) {
                $duoianh = ['jpg', 'png', 'jpeg', 'gif'];
                $duoi = pathinfo($anh_moi['name'], PATHINFO_EXTENSION);
                if (!in_array($duoi, $duoianh)) {
                    $errer['img'] = "File không phải là ảnh";
                } else {
                    $img = $anh_moi['name'];
                }
            } else {
                $img = $anh;
            }
            if (empty($errer)) {
                move_uploaded_file($anh_moi['tmp_name'], "./public/img_upload/" . $img);
                $sql = 'UPDATE user SET fullname=?,`email`=?,`password`=?,`hinh`=?,`location`=? WHERE ma_us=?';
                $db = new DBConnection();
                $connect = $db->connect();
                $stmp = $connect->prepare($sql);
                $stmp->bindParam(1, $fullname, \PDO::PARAM_STR);
                $stmp->bindParam(2, $email, \PDO::PARAM_STR);
                $stmp->bindParam(3, $password, \PDO::PARAM_STR);
                $stmp->bindParam(4, $img, \PDO::PARAM_STR);
                $stmp->bindParam(5, $location, \PDO::PARAM_STR);
                $stmp->bindParam(6, $ma_us, \PDO::PARAM_STR);
                if ($stmp->execute()) {

                    echo "<script>alert('Sửa thành công');</script>";
                    header("Refresh: 3; URL=index.php");
                } else {
                    echo 'Co loi xay ra, vui long kiem tra lai. 
            hoac chon username khac!!! : ';
                }
            }
        }
    }

    //Show ra form đăng kí
    public static function showRegister(){
        $view  = './app/Views'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showRegister');
    }

    //THực thi tạo tài khoản
    public static function register(){
        if (isset($_POST['creat']) && ($_POST['creat'])) {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $anh = $_FILES['img'];
            $location=$_POST['location'];
            $errer = [];
            if (empty($fullname)) {
                $errer['fullname'] = "Vui lòng nhập họ và tên";
            }
            if (empty($email)) {
                $errer['email'] = "Vui lòng nhập email";
            }
            if(empty($password)){
                $errer['password'] = "Vui lòng nhập mật khẩu";
            }
            if ($anh['size'] <= 0) {
                $errer['img'] = "Vui lòng chọn file ảnh";
            } else {
                $duoianh = ['jpg', 'png', 'jpeg', 'gif'];
                $duoi = pathinfo($anh['name'], PATHINFO_EXTENSION);
                if (!in_array($duoi, $duoianh)) {
                    $errer['img'] = "File không phải là ảnh";
                } else {
                    $img = $anh['name'];
                }
            }
            if(empty($location)){
                $errer['location']="Vui lòng nhập địa chỉ";
            }
            if (empty($errer)) {
                move_uploaded_file($anh['tmp_name'], "./public/img_upload/" .$img);
                $sql = 'INSERT INTO `user`(`fullname`, `email`, `password`, `hinh`, `location`) VALUES (?,?,?,?,?)';
                $db = new DBConnection();
                $connect = $db->connect();
                $stmp = $connect->prepare($sql);
                $stmp->bindParam(1, $fullname, \PDO::PARAM_STR);
                $stmp->bindParam(2, $email, \PDO::PARAM_STR);
                $stmp->bindParam(3, $password, \PDO::PARAM_STR);
                $stmp->bindParam(4, $img, \PDO::PARAM_STR);
                $stmp->bindParam(5, $location, \PDO::PARAM_STR);
                if ($stmp->execute()) {

                    echo "<script>alert('Tạo tài khoản thành công. Mời bạn đăng nhập.');</script>";
                    header("Refresh: 3; URL=login.php?url=dn");
                } else {
                    echo 'Co loi xay ra, vui long kiem tra lai. 
            hoac chon username khac!!! : ';
                }
                $tb="Tạo Thành công";
            }
        }
    }

    //Quên mật khẩu
    public static function showForgot(){
        $view  = './app/Views'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showForgot');
    }
    public static function forGet(){
        if (isset($_POST['lay_lai']) && ($_POST['lay_lai'])) {
            $email = $_POST['email'];
            $data = [];
            if (empty($email)) {
                $data = ['error'=>'Vui lòng nhập Email'];
            } else {
                $sql = 'SELECT * FROM user WHERE email=?';
                $db = new DBConnection();
                $connect = $db->connect();
                $stmp = $connect->prepare($sql);
                $stmp->bindParam(1, $email, \PDO::PARAM_STR);
                $stmp->execute();
                $row = $stmp->fetch(\PDO::FETCH_ASSOC);
                if ($row) {
                    $data = ['password'=>$row['password']];
                } else {
                    $data = ['error'=>'Co loi xay ra, vui long kiem tra lai. 
                hoac chon Email khac!!!'];
                }
            }

            $view  = './app/Views'; // dinh nghia thu muc chia view!
            $cache = './storage'; // thu muc cache cho bladeone
            $blade = new BladeOne($view,$cache);
            echo $blade->run('showForgot',$data);


        }
    }


}