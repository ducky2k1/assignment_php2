<?php
use Dotenv\Dotenv;
require 'vendor/autoload.php';
require './common/Route.php';
use Trinhduc\AssignPhp2\Product\product;
use Trinhduc\AssignPhp2\Users\users;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (isset($_GET['url'])){
    $url = $_GET['url'];
} else $url ='main';

$route = new \common\Route();
//$route->addRoute('dn',[users::class,'showLogin']);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự án mẫu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./public/css/style.css">

</head>
<body>
<div class="container h-auto">
    <nav class="bg-[#eee] border-gray-200 fixed top-0 w-[1536px] z-[100]" id="header">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4 bg-blue">
            <a href="./index.php" class="flex items-center">
                <img src="./public/imgindex/X.png" class="h-8 mr-3" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">X-Shop</span>
            </a>
            <div class="flex items-center md:order-2">

                <?php
                if (isset($_GET['url'])){
                    $act = $_GET['url'];
                    switch ($act){
                        case 'dh':
                            $route->addRoute('dh',[users::class,'showIconLogin']);
                            break;
                        case 'dt':
                            $route->addRoute('dt',[users::class,'showIconLogin']);
                            break;
                        case 'lt':
                            $route->addRoute('lt',[users::class,'showIconLogin']);
                            break;
                        case 'ma':
                            $route->addRoute('ma',[users::class,'showIconLogin']);
                            break;
                        case 'ct':
                            $route->addRoute('ct',[users::class,'showIconLogin']);
                            break;
                        default:
                            $route->addRoute('main',[users::class,'showIconLogin']);
                            break;
                    }
                } else{
                    $route->addRoute('main',[users::class,'showIconLogin']);
                }

                $handler = $route->getRoute($url);
                call_user_func($handler);
                ?>

            </div>
            <div id="mega-menu" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                <ul class="flex flex-col mt-4 font-medium md:flex-row md:space-x-8 md:mt-0">
                    <li>
                        <a href="./index.php" class="block py-2 pl-3 pr-4 text-[#37A9CD] border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 font-bold " aria-current="page">Trang chủ</a>
                    </li>
                    <li>
                        <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-bold text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0">
                            Danh mục <svg aria-hidden="true" class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div id="mega-menu-dropdown" class="absolute z-10 grid hidden w-auto grid-cols-2 text-sm bg-white border border-gray-100 rounded-lg shadow-md dark:border-gray-700 md:grid-cols-2">
                            <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                                <ul class="space-y-4" aria-labelledby="mega-menu-dropdown-button">
                                    <li>
                                        <a href="index.php?url=dh" class="text-gray-500 hover:text-blue-600 font-bold">
                                            Đồng hồ
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./index.php?url=dt" class="text-gray-500 hover:text-blue-600 font-bold">
                                            Điện thoại
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./index.php?url=lt" class="text-gray-500 hover:text-blue-600 font-bold">
                                            Laptop
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./index.php?url=ma" class="text-gray-500 hover:text-blue-600 font-bold">
                                            Máy ảnh
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="p-4">
                                <ul class="space-y-4">
                                    <li>
                                        <a href="#" class="text-gray-500 hover:text-blue-600 font-bold">
                                            Liên hệ
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-500 hover:text-blue-600 font-bold">
                                            Góp ý
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-500 hover:text-blue-600 font-bold">
                                            Hỏi đáp
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 font-bold ">Liên hệ</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 font-bold ">Góp ý</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 font-bold ">Hỏi đáp</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="box mt-[60px]">
        <div class="boxright float-right" style="width: 26%;">
            <div class="row">
                <?php
                if(isset($_SESSION['login'])) {
                    if (isset($_GET['url'])){
                        $act = $_GET['url'];
                        switch ($act){
                            case 'dh':
                                $route->addRoute('dh',[users::class,'showInfo']);
                                break;
                            case 'dt':
                                $route->addRoute('dt',[users::class,'showInfo']);
                                break;
                            case 'lt':
                                $route->addRoute('lt',[users::class,'showInfo']);
                                break;
                            case 'ma':
                                $route->addRoute('ma',[users::class,'showInfo']);
                                break;
                            case 'ct':
                                $route->addRoute('ct',[users::class,'showInfo']);
                                break;
                            default:
                                $route->addRoute('main',[users::class,'showInfo']);
                                break;
                        }
                    } else{
                        $route->addRoute('main',[users::class,'showInfo']);
                    }
                    $handler = $route->getRoute($url);
                    call_user_func($handler);
                }
                ?>
            </div>
            <div class="row">
                <div class="boxtitle "> Danh mục</div>
                <div class="boxcontent2 ">
                    <ul>
                        <li><a href="./index.php">Sản phẩm</a></li>
                        <li><a href="./index.php?url=dh">Đồng hồ</a></li>
                        <li><a href="./index.php?url=dt">Điện thoại</a></li>
                        <li><a href="./index.php?url=lt">Laptop</a></li>
                        <li><a href="./index.php?url=ma">Máy ảnh</a></li>

                    </ul>
                </div>
                <div class="boxfooter">
                    <label>
                        <input type="text" placeholder="Từ khóa muốn tìm kiếm">
                    </label>

                </div>
            </div>
            <div class="row">
                <div class="boxtitle">Top 10 yêu thích </div>
                <div class="boxcontentt p-0">
                    <?php

                    if (isset($_GET['url'])){
                        $act = $_GET['url'];
                        switch ($act){
                            case 'dh':
                                $route->addRoute('dh',[product::class,'showTop10']);
                                break;
                            case 'dt':
                                $route->addRoute('dt',[product::class,'showTop10']);
                                break;
                            case 'lt':
                                $route->addRoute('lt',[product::class,'showTop10']);
                                break;
                            case 'ma':
                                $route->addRoute('ma',[product::class,'showTop10']);
                                break;
                            case 'ct':
                                $route->addRoute('ct',[product::class,'showTop10']);
                                break;
                            default:
                                $route->addRoute('main',[product::class,'showTop10']);
                                break;
                        }
                    } else{
                        $route->addRoute('main',[product::class,'showTop10']);
                    }
                    $handler = $route->getRoute($url);
                    call_user_func($handler);

                    ?>
                </div>
            </div>
            </div>

        </div>
    <div class="boxleft float-left">
        <div class="row">

            <div class="slideshow-container max-w-none">
                <div class="mySlides fade">
                    <img src="./public/IMG/hinh1.jpg" style="width:100%; height:350px;">
                </div>
                <div class="mySlides fade">
                    <img src="./public/IMG/hinh2.jpg" style="width:100%; height:350px;">
                </div>
                <div class="mySlides fade">
                    <img src="./public/IMG/hinh3.jpg" style="width:100%; height:350px;">
                </div>
                <div class="mySlides fade">
                    <img src="./public/IMG/hinh4.png" style="width:100%; height:350px;" alt="">
                </div>
            </div>
            <br>
            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
            <?php
            $route->addRoute('main',[product::class,'showAll']);
            $route->addRoute('dh',[product::class,'showDH']);
            $route->addRoute('dt',[product::class,'showDT']);
            $route->addRoute('lt',[product::class,'showLT']);
            $route->addRoute('ma',[product::class,'showMA']);
            $route->addRoute('ct',[product::class,'showChiTiet']);
            $handler = $route->getRoute($url);
            call_user_func($handler);
            ?>
        </div>
    </div>
</div>

<!--        --><?php
//        if (isset($_GET['act'])){
//            $act = $_GET['act'];
//            switch ($act){
//                case 'dh' :
//                    $ds_dh = hanghoa_loai_dongho_selectAll();
//                    require_once './giaodien/watch.php';
//                    // require './footer.php';
//                    break;
//                case 'dt' :
//                    $ds_dt = hanghoa_loai_dienthoai_selectAll();
//                    require_once './giaodien/phone.php';
//                    break;
//                case 'lt' :
//                    $ds_lt = hanghoa_loai_laptop_selectAll();
//                    require_once './giaodien/laptop.php';
//                    break;
//                case 'ma' :
//                    $ds_ma = hanghoa_loai_mayanh_selectAll();
//                    require_once './giaodien/mayanh.php';
//                    break;
//                case 'ct':
//                    //hiển thị loại
//                    $ds_loai = loai_selectAll();
//                    //hiển thị hàng
//                    $ma_hh = $_GET['id'];
//                    //click +1 lượt xem
//                    $sql="UPDATE hang_hoa set so_luot_xem=so_luot_xem+1 where ma_hh=$ma_hh";
//                    pdo_execute($sql);
//                    //hiển thị danh sách hàng háo theo mã hàng hóa
//                    $ds = hanghoa_select($ma_hh);
//                    //hiển thị nội dung bình luận theo mã hàng hóa
//                    $ds_bl=hh_bl_kh_selectAll($ma_hh);
//                    require_once './giaodien/chitiet_hanghoa.php';
//                    break;
//                case 'bl':
//                    $ma_hh = $_GET['id'];
//                    $date = date('Y-m-d');
//                    $comment = $_POST['cmt'];
//                    $sql="INSERT INTO `binh_luan`(`noi_dung`, `ma_hh`, `ma_kh`, `ngay_bl`) VALUES ('$comment',$ma_hh, $ma_us ,'$date') ";
//                    pdo_execute($sql);
//                    $ds = hanghoa_select($ma_hh);
//
//                    $ds_bl=hh_bl_kh_selectAll($ma_hh);
//
//                    require_once './giaodien/chitiet_hanghoa.php';
//                    break;
//
//                default:
//                    $ds_hanghoa = hanghoa_loai_nine_selectAll();
//                    include "./giaodien/sanpham.php";
//                    break;
//            }
//        } else {
//            $ds_hanghoa = hanghoa_loai_nine_selectAll();
//            require_once './giaodien/sanpham.php';
//        } ?>

        <script>
            let slideIndex = 0;
            showSlides();

            function showSlides() {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {slideIndex = 1}
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";
                dots[slideIndex-1].className += " active";
                setTimeout(showSlides, 5000); // Change image every 2 seconds
            }


            var menu = document.getElementById('mega-menu-dropdown-button');
            var bar = document.getElementById('mega-menu-dropdown');
            var head = document.getElementById('header');



            menu.onclick = function () {

                var isClosed = head.clientHeight === 56.5;
                if(isClosed){
                    bar.classList.toggle('hidden');
                } else{
                    bar.classList.toggle('hidden');
                }
            }
        </script>