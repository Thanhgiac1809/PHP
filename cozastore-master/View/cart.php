<div class="table-responsive">
    <?php
    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) :
        echo '<script> alert("Gio hang cua ban chua co san pham nao ...")</script>';
    ?>

    <?php
    else :
    ?>
        <form action="" method="post">
            <table class="table table-bordered mt-5">
                <thead class="">
                    <tr>
                        <td colspan="5">
                        </td>
                    </tr>
                    <tr class="table-success">
                        <th>Số TT</th>
                        <th>Thông Tin Sản Phẩm</th>
                        <th>Tùy Chọn Của Bạn</th>
                        <th colspan="2">Giá</th>
                    </tr>
                </thead>
                <tbody class="">
                    <!-- Gio hang ton tai -->
                    <?php
                    $j = 0;
                    foreach ($_SESSION['cart'] as $key => $item) :
                        $j++;
                    ?>
                        <tr>
                            
                            <td><?php echo $j; ?></td>
                            <!-- image -->
                            <td><img width="50px" height="50px" src="images/<?php echo $item['hinh'];  ?>"><?php echo $item['name'];  ?></td>
                            <td>Màu:<?php echo $item['mausac']; ?> <br> Size: <?php echo $item['size']; ?> </td>
                              <!-- Don gia -->
                            <td>Đơn Giá: <?php echo number_format($item['cost']); ?>- Số Lượng: <input type="text" name="newqty[]" value="<?php echo $item['quanty']; ?>" /><br />
                                <p style="float: right;"> Thành Tiền
                                    <?php echo number_format($item['total']); ?><sup><u>$</u></sup></p>
                            </td>
                            <td><a href="index.php?action=giohang&act=delete_item&id=<?php echo $key; ?>"><button type="button"
                                class="btn btn-danger">Xóa</button></a>
                                <button type="submit" class="btn btn-secondary">Sửa </button>

                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                    <tr>
                        <td colspan="3">
                            <b>Tổng Tiền</b>
                        </td>
                        <td style="float: right;">
                            <b>
                                <?php
                                $gh = new giohang();
                                $gettotal = $gh->getTotal();
                                echo number_format($gettotal);
                                ?>
                                <sup><u>đ</u></sup></b>
                        </td>
                        <td><a href="index.php?action=order">Thanh toán</a></td>
                    </tr>
                </tbody>
            </table>
        </form>
    <?php
    endif;
    ?>
</div>
</div>