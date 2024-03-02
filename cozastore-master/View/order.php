<div class="table-responsive">
    <?php
    if (!isset($_SESSION['makh']) || count($_SESSION['cart']) == 0) :
        echo '<script> alert("ban chua dang nhap...")</script>';
        include 'login.php';
    ?>

    <?php
    else :
    ?>

        <form action="index.php?action=order$act=order_detail" method="post">
            <table class="table table-bordered" border="0">
                <?php
                $hd = new hoadon();
                $result = $hd->getOrder($_SESSION['masohd']);
                $sohd = $result['masohd'];
                $ngaylap = $result['ngaydat'];
                $tenkh = $result['tenkh'];
                $diachi = $result['diachi'];
                $sodt = $result['sodienthoai'];
                $d = new DateTime($ngaylap);

                ?>
                <tr>
                    <td colspan="4">
                        <h2 style="color: red;">HÓA ĐƠN</h2>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Số Hóa đơn: <?php echo $sohd ?></td>
                    <td colspan="2"> Ngày lập: <?php echo $d->format('d/m/Y'); ?></td>
                </tr>
                <tr>
                    <td colspan="2">Họ và tên:</td>
                    <td colspan="2"> <?php echo $tenkh ?></td>
                </tr>
                <tr>
                    <td colspan="2">Địa chỉ: </td>
                    <td colspan="2"> <?php echo $diachi ?></td>
                </tr>
                <tr>
                    <td colspan="2">Số điện thoại: </td>
                    <td colspan="2"> <?php echo $sodt ?></td>
                </tr>

            </table>
            <!-- Thông tin sản phầm -->
            <table class="table table-bordered">
                <thead>

                    <tr class="table-success">
                        <th>Số TT</th>
                        <th>Thông Tin Sản Phẩm</th>
                        <th>Tùy Chọn Của Bạn</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $j = 0;
                    $result = $hd->getOrderDetail($_SESSION['masohd']);
                    while ($set = $result->fetch()) :
                        $j++;

                    ?>
                        <tr>
                            <td><?php echo $j ?></td>
                            <td><?php echo $set['tenhh'] ?></td>
                            <td>Đơn Giá:<?php echo number_format($set['dongia']) ?> - Số Lượng:<?php echo $set['soluongmua'] ?> <br />
                            </td>
                        </tr>
                    <?php
                    endwhile;
                    ?>
                    <tr>
                        <td colspan="3">
                            <b>Tổng Tiền</b>
                        </td>
                        <td style="float: right;">
                            <b>
                                <?php $gh = new giohang();
                                echo number_format($gh->getTotal());
                                ?>
                                <sup><u>đ</u></sup></b>
                        </td>

                    </tr>
                </tbody>
            </table>
        </form>
    <?php
    endif;
    unset($_SESSION['cart']);
    ?>
</div>
</div>