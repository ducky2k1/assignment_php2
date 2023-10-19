<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách loại hàng</title>
    <link rel="stylesheet" href="public/css/styleBE.css">
    <link rel="stylesheet" href="public/css/styleTable.css">


</head>
<body>
<div class="container">
    <div class="header">
        <h1>Admin</h1>
    </div>
    <div class="menu">
        <ul class="menu-bar">
            <li><a href="./index.php">Trang chủ</a></li>
            <li><a href="./BE.php">Loại hàng</a></li>
            <li><a href="./BE.php?url=hh">Hàng hóa</a></li>
            <li><a href="./BE.php?url=kh">Khách hàng</a></li>
            <li><a href="./BE.php?url=bl">Bình luận</a></li>
        </ul>
    </div>
    <?php
    require 'vendor/autoload.php';
    require './common/Route.php';
    use Dotenv\Dotenv;
    use Trinhduc\AssignPhp2\Controllers\Product\type;
    use Trinhduc\AssignPhp2\Product\listProduct;
    use Trinhduc\AssignPhp2\Controllers\Product\productBE;
    use Trinhduc\AssignPhp2\Controllers\Product\customer;
    use Trinhduc\AssignPhp2\Controllers\Product\commentBE;
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    if (isset($_GET['url'])) {
        $url = $_GET['url'];
    } else $url = '/';

    $route = new \common\Route();
    $route->addRoute('/', [listProduct::class, 'showLoai']);
    $route->addRoute('hh', [listProduct::class, 'showHangHoa']);
    $route->addRoute('kh', [listProduct::class, 'showKhachHang']);
    $route->addRoute('bl', [listProduct::class, 'showBinhLuan']);
    $route->addRoute('showCreateLoai', [type::class, 'showCreateLoai']);
    $route->addRoute('createLoai', [type::class, 'createLoai']);
    $route->addRoute('deleteLoai', [type::class, 'deleteLoai']);
    $route->addRoute('showEditLoai', [type::class, 'showEditLoai']);
    $route->addRoute('updateLoai', [type::class, 'updateLoai']);
    $route->addRoute('showCreateProduct', [productBE::class, 'showCreateProduct']);
    $route->addRoute('deleteProduct', [productBE::class, 'deleteProduct']);
    $route->addRoute('createProduct', [productBE::class, 'createProduct']);
    $route->addRoute('showEditProduct', [productBE::class, 'showEditProduct']);
    $route->addRoute('updateProduct', [productBE::class, 'updateProduct']);
    $route->addRoute('showCreateCustomer', [customer::class, 'showCreateCustomer']);
    $route->addRoute('createCustomer', [customer::class, 'createCustomer']);
    $route->addRoute('deleteUser', [customer::class, 'deleteUser']);
    $route->addRoute('showEditCustomer', [customer::class, 'showEditCustomer']);
    $route->addRoute('updateCustomer', [customer::class, 'updateCustomer']);
    $route->addRoute('deleteComment', [commentBE::class, 'deleteComment']);
    $route->addRoute('confirm', [commentBE::class, 'confirm']);
    // lay ra hàm trc đó đã thêm trong route
    $handler = $route->getRoute($url);
    call_user_func($handler);

    ?>

</div>
<script>

    // Chức năng chọn hết
    document.getElementById("btn1").onclick = function ()
    {
        // Lấy danh sách checkbox
        var checkboxes = document.getElementsByName('name[]');

        // Lặp và thiết lập checked
        for (var i = 0; i < checkboxes.length; i++){
            checkboxes[i].checked = true;
        }
    };

    // Chức năng bỏ chọn hết
    document.getElementById("btn2").onclick = function ()
    {
        // Lấy danh sách checkbox
        var checkboxes = document.getElementsByName('name[]');

        // Lặp và thiết lập Uncheck
        for (var i = 0; i < checkboxes.length; i++){
            checkboxes[i].checked = false;
        }
    };

</script>
</body>
</html>