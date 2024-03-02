<?php
    $act='thongke';
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }

    switch($act)
    {
        case 'thongke':
            include "./View/thongke.php";
            break;
        case 'thongke_action':


        // gọi view để hiển thị kết quả thống kê
        include "./View/thongke.php";
        break;
        
    }
?>
