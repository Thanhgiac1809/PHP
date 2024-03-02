<?php
    class giohang {
        // viet phuong thuc them 1 object vao trong gio hang
        function add_items($key,$quantity,$mycolor,$size){
            $prod=new hanghoa();
            $pros=$prod->getHangHoaId($key); // mang cua 1 object
            $hinh=$pros["hinh"];
            $ten=$pros["tenhh"];
            $cost=$pros["dongia"];
            $total=$cost*$quantity;

            // tao doi tuong 
            $item=array(
                'mahh'=>$key,
                'hinh'=>$hinh,
                'name'=>$ten,
                'mausac'=>$mycolor,
                'size'=>$size,
                'cost'=>$cost,
                'quanty'=>$quantity,
                'total'=>$total,
            );

            // dem doi tuong vao session
            $_SESSION['cart'][]=$item;
            //a[]=item
        }

        function getTotal(){
            $subtotal=0;
            foreach($_SESSION['cart'] as $item){
                $subtotal+=$item['total'];
            }
            return $subtotal;
        }

        function delete_item($vitri){
            unset($_SESSION['cart'][$vitri]);
        }

        function update_items($vitri,$soluong)
        {
            if($soluong<=0)
            {
                $this->delete_item($vitri);
            }
            else {
                // chi thuc hien phep gan
                $_SESSION['cart'][$vitri]['quanty']=$soluong;
                $total_new=$_SESSION['cart'][$vitri]['quanty']*$_SESSION['cart'][$vitri]['cost'];
                $_SESSION['cart'][$vitri]['total']=$total_new;
            }
        }
    }
?>
