<?php

namespace Trinhduc\AssignPhp2\Controllers\Product;

use eftec\bladeone\BladeOne;
use Trinhduc\AssignPhp2\DBconnection;

class customer
{
    public static function showCreateCustomer(){
        $view  = './app/Views/BE/showCreate'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showCreateCustomer');
    }
    public static function createCustomer(){


            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $anh = $_FILES['img'];
            $location = $_POST['location'];
            $role = $_POST['role'];
            $errer = [];
            if (empty($fullname)) {
                $errer['fullname'] = "Họ và tên không được để trống";
            } else {
                if (strlen($fullname) < 6) {
                    $errer['fullname'] = "Vui lòng nhập đầu đủ họ và tên";
                }
            }
            if (empty($email)) {
                $errer['email'] = "Email không được để trống";
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errer['email'] = "Email không đúng định dạng";
                }
            }
            if (empty($password)) {
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
            if (empty($location)) {
                $errer['location'] = "Vui lòng nhập địa chỉ";
            }
            if (empty($errer)) {
                move_uploaded_file($anh['tmp_name'], './public/img_upload/' . $img);
                $sql = 'INSERT INTO user(fullname,email,password,hinh,location,role) VALUES (?,?,?,?,?,?)';
                $db = new DBConnection();
                $connect = $db->connect();
                $stmp = $connect->prepare($sql);
                $stmp->bindParam(1, $fullname, \PDO::PARAM_STR);
                $stmp->bindParam(2, $email, \PDO::PARAM_STR);
                $stmp->bindParam(3, $password, \PDO::PARAM_STR);
                $stmp->bindParam(4, $img, \PDO::PARAM_STR);
                $stmp->bindParam(5, $location, \PDO::PARAM_STR);
                $stmp->bindParam(6, $role, \PDO::PARAM_STR);
                if ($stmp->execute()) {
                    echo "<script>alert('Thêm mới khách hàng thành công.');</script>";
                    header("Refresh: 3; URL=BE.php?url=kh");
                } else {
                    echo 'Co loi xay ra, vui long kiem tra lai.';
                }
            }
    }

    public static function deleteUser(){
        $ma = $_GET['id'];
        $sql = "DELETE FROM `user` WHERE ma_us=?";
        $db = new DBConnection();
        $connect = $db->connect();
        $stmp = $connect->prepare($sql);
        $stmp->bindParam(1, $ma, \PDO::PARAM_STR);
        if ($stmp->execute()) {

            header("Refresh: 0; URL=BE.php?url=kh");
        } else {
            echo 'Co loi xay ra, vui long kiem tra lai.';
        }
    }

    public static function showEditCustomer(){
        $ma = $_GET['id'];
        $sql="SELECT * FROM `user` where ma_us =?";
        $db = new DBConnection();
        $conn = $db->connect();
        $stmp = $conn->prepare($sql);
        $stmp->bindParam(1, $ma);
        $stmp->execute();

        $data = [
            'customer'=>$stmp->fetch(\PDO::FETCH_ASSOC)
        ];
        $view  = './app/Views/BE/showEdit'; // dinh nghia thu muc chia view!
        $cache = './storage'; // thu muc cache cho bladeone
        $blade = new BladeOne($view,$cache);
        echo $blade->run('showEditCustomer',$data);
    }
    public static function updateCustomer(){
        $ma = $_GET['id'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $anh = $_POST['img'];
        $anh_moi = $_FILES['anh'];
        $location = $_POST['location'];
        $errer = [];

        if (empty($fullname)) {
            $errer['fullname'] = "Họ và tên không được để trống";
        } else {
            if (strlen($fullname) < 6) {
                $errer['fullname'] = "Vui lòng nhập đầu đủ họ và tên";
            }
        }
        if (empty($email)) {
            $errer['email'] = "Email không được để trống";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errer['email'] = "Email không đúng định dạng";
            }
        }
        if (empty($password)) {
            $errer['password'] = "Vui lòng nhập mật khẩu";
        }
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
        if (empty($location)) {
            $errer['location'] = "Vui lòng nhập địa chỉ";
        }
        if (empty($errer)) {
            move_uploaded_file($anh_moi['tmp_name'], "./public/img_upload/" . $img);
            $sql = 'UPDATE `user` SET `fullname`=?,`email`=?,`password`=?,`hinh`=?,`location`=? WHERE ma_us=?';
            $db = new DBConnection();
            $connect = $db->connect();
            $stmp = $connect->prepare($sql);
            $stmp->bindParam(1, $fullname, \PDO::PARAM_STR);
            $stmp->bindParam(2, $email, \PDO::PARAM_STR);
            $stmp->bindParam(3, $password, \PDO::PARAM_STR);
            $stmp->bindParam(4, $img, \PDO::PARAM_STR);
            $stmp->bindParam(5, $location, \PDO::PARAM_STR);
            $stmp->bindParam(6, $ma, \PDO::PARAM_STR);

            if ($stmp->execute()) {
                echo "<script>alert('Sửa thành công.');</script>";
                header("Refresh: 3; URL=BE.php?url=kh");
            } else {
                echo 'Co loi xay ra, vui long kiem tra lai.';
            }
        }
    }
}