<?php 
    // kiem tra xem co gio hang hay ch? neu chua co thi tao gio hang
    if(!isset($_SESSION["cart"])){
        // tao gipo hang
        $_SESSION["cart"]=array();
    }
    $act='giohang';
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }

    switch ($act) {
        case 'giohang':
            // lay thong tin khi nguoi dung click nut mua hang
            if(isset($_POST["mahh"])){
                $mahh=$_POST["mahh"];
                $soluong=$_POST["soluong"];
                $mausac=$_POST["mymausac"];
                $size=$_POST["size"];

            // dem thong tin nay add vao trong gio hang? ailam? model lam
                $gh=new giohang();
                $gh->add_items($mahh,$soluong,$mausac,$size);
            }
            include "./View/cart.php";
            break;
        
            case 'delete_item':
                // nhan id 
                if(isset($_GET['id']))
                {
                    $indexs=$_GET['id'];
                    // controller yeu cau model thuc hien phuong thuc xoa
                    $gh=new giohang();
                    $gh->delete_item($indexs);
                }
                include "./View/cart.php";
            break;
        case 'update_item':
            // can chinh so luong nen chi nhan cap the input la so luong
            if(isset($_POST['newqty']))
            {
                $new_list=$_POST['newqty'];
                foreach($new_list as $vitri=>$qty)
                {
                    // new tai vi tri lay ra tu newlist ma co qty khac voi vi tri trong session
                    if($_SESSION['cart'][$vitri]['quanty']!=$qty)//
                    {
                        $gh=new giohang();
                        $gh->update_items($vitri,$qty);
                    }
                }
            }
            include "./View/cart.php";
            break;
    }
