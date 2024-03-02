<?php 
    $act='dangnhap';
    if(isset($_GET['act']))
    {
        $act = $_GET['act'];
    }

    switch ($act) {
        case 'dangnhap':
            include "./View/login.php";
            break;
            
        case 'dangnhap_action':
            // nhan nut dang nhap, chuyen qua day user va pass
            if(isset($_POST['txtusername']) && isset($_POST['txtpassword']))
            {
                $user=$_POST['txtusername'];
                $cdau="GFR5%";
                $csau="!2*GH";
                $pass=md5($cdau.$_POST['txtpassword'].$csau);
                // controller yeu cau model xem ten nay co ton tai trong database k
                $ur=new user();
                $urs=$ur->loginUser($user, $pass);
                if($urs!=false)
                {
                    // dang nhap co, lay thong tin cua user do luu vao torng database
                    $_SESSION['makh']=$urs['makh'];
                    $_SESSION['tenkh']=$urs['tenkh'];
                    $_SESSION['username']=$urs['username'];
                    echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=content"/>';
                }
                else {
                    // dang nhap khong thanh cong
                    echo '<script>alert("dang nhap khong thanh cong");</script>';
                    include "./View/registration.php";
                }
            }
            break;
            case 'logout': 
                if(isset($_SESSION['makh']))
                {
                    unset($_SESSION['makh']);
                    unset($_SESSION['tenkh']);
                    unset($_SESSION['username']);
                    unset($_SESSION['cart']);
                }
                echo '<meta http-equiv="refresh" content="0; url=./index.php?action=content"/>';
                break;
    }
    ?>
