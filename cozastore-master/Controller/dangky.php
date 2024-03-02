<?php
    // truyen thong gia tri ma nguoi dung nhap qua day
    $act='dangky';
    if(isset($_GET['act'])){
        $act=$_GET['act'];
    }

    switch($act){
        case 'dangky':
            include "./View/registration.php";
            break;

        case 'inset_item':
            if(isset($_POST['txttenkh'])){
                $tenkh=$_POST['txttenkh'];
                $diachi=$_POST['txtdiachi'];
                $sodt=$_POST['txtsodt'];
                $tendn=$_POST['txtusername'];
                $password=$_POST['txtpass'];
                $email=$_POST['txtemail'];
                // mat khau phai duoc ma hoa md5, md5 khong co bam nguoc la 1 chuoi da bam thanh ban dau
                $cdau="GFR5%";
                $csau="!2*GH";  
                $cryt=md5($cdau.$password.$csau);
                // controller yeu cau model phai thuc hien phuong thuc chen vao database
                // truoc khi insert vao thi kiem tra xem username do da ton tai torng database
                $ur= new user();
                $test=$ur->exitUser($tendn);

                if($test!=false)
                {
                    echo '<script>alert("Đăng kí không thành công");</script>';
                    include './View/registration.php';
                } else 
                {
                    $check=$ur->InsertUser($tenkh, $tendn, $cryt, $email, $diachi, $sodt);
                     if($check!='false')
                {
                    echo '<script>alert("dang ky thanh cong");</script>';
                    include './View/content.php';
                } else {
                    echo '<script>alert("dang ky ko thanh cong");</script>';
                    include './View/registration.php';
                }
                }           
            }
            break;
        }
    // include "./view/registration.php";
?>
