<?php
    //controller lay thong tin insert vao bang hoa don truoc, co hoa don 
    // thi moi insert vao bang chi tiet hoa don
    if(isset($_SESSION['makh']))
    {
        $makh=$_SESSION['makh'];
        $or=new hoadon();
        $sohd=$or->InsertOrder($makh);
        $_SESSION['masohd']=$sohd;
        // echo $sohd;
        // tien hanh lay thong tin tu gio hang chen vo bang chi tiet hoa don
        // duyet qua mang $_SESSION['cart]
        $total=0;
        foreach($_SESSION['cart'] as $key => $item)
        {
            $or->insertOrderDetail($sohd, $item['mahh'],$item['quanty'],$item['total']);
            $total += $item['total'];
        }

        // // viet phuong thuc cap nhat tongtien trong bang hoa don lai
        $or->updateOrderTotal($sohd,$total);
    }
    include "./View/order.php";
?>
