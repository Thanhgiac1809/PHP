<?php
    // include "./View/hanghoa.php";
    $act="hanghoa";
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch($act){
        case 'hanghoa':
            include "./View/hanghoa.php";
            break;
        case 'edit':
            include "./View/edithanghoa.php";
            break;
        case 'themsp':
            include "./View/edithanghoa.php";
            break;  
        case 'themsp_action':
                $tenhh=$_POST['tenhh'];
                $dongia = $_POST['dongia'];
                $giamgia = $_POST['giamgia'];
                $hinh = $_FILES['image']['name'];
                $nhom=$_POST['nhom'];
                $maloai = $_POST['maloai'];
                $dacbiet = $_POST['dacbiet'];
                $soluotxem = $_POST['slx'];
                $ngaylap = $_POST['ngaylap'];
                $mota = $_POST['mota'];
                $soluongton = $_POST['slt'];
                $mausac = $_POST['mausac'];
                $size = $_POST['size'];
                // lay gia tri xong, luc mnay insetr vao database
                $hh=new hanghoa();
                $check=$hh->insertsp($tenhh,$dongia,$giamgia,$hinh,$nhom,$maloai,$dacbiet,$soluotxem,$ngaylap,$mota,$soluongton,$mausac,$size);
                if($check!==false)
                {
                    uploadimage();
                    echo '<script> alert("Insert thanh cong")</script>';
                    include "./View/hanghoa.php";
                } else {
                    echo '<script> alert("Insert no thanh cong")</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=themsp"/>';
                }
            break;  
        case 'edit_action':
            if(isset($_GET['id']))
            {
                $mahh=$_GET['id'];
                $tenhh=$_POST['tenhh'];
                $dongia = $_POST['dongia'];
                $giamgia = $_POST['giamgia'];
                $hinh = $_FILES['image']['name'];
                $Nhom=$_POST['nhom'];
                $maloai = $_POST['maloai'];
                $dacbiet = $_POST['dacbiet'];
                $soluotxem = $_POST['slx'];
                $ngaylap = $_POST['ngaylap'];
                $mota = $_POST['mota'];
                $soluongton = $_POST['slt'];
                $mausac = $_POST['mausac'];
                $size = $_POST['size'];
                // lay gia tri xong, luc mnay insetr vao database
                $hh=new hanghoa();
                $checkup=$hh->updatesp($mahh,$tenhh,$dongia,$giamgia,$hinh,$Nhom,$maloai,$dacbiet,$soluotxem,$ngaylap,$mota,$soluongton,$mausac,$size);
                if($checkup!==false)
                {
                    uploadimage();
                    echo '<script> alert("Update thanh cong")</script>';
                    include "./View/hanghoa.php";
                } else {
                    echo '<script> alert("Update no thanh cong")</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=themsp"/>';
                }
            break;  
        }
        case 'delete_action':
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
                $hh=new hanghoa();
                $hh->deletesp($id);
                include "./View/hanghoa.php";
        }
    }
?>
