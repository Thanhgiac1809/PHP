<?php
$act = "sanpham";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case "sanpham":
        include "./View/sanpham.php";
        break;
    case "detail":
        if (isset($_POST['txtmahh'])) {
            $mahh = $_POST['txtmahh'];
            $makh = $_SESSION['makh'];
            $noidung = $_POST['comment'];
            //đem thông tin nayyf insert vào database,model làm
            $bl = new binhluan();
            $bl->InsertComment($mahh, $makh, $noidung);
        }
        include "./View/sanphamchitiet.php";
        break;
    case "giohang":
        include "./View/cart.php";
        break;
    case "timkiem":
        include "./View/sanpham.php";
        break;
}
