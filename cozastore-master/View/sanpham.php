<?php
$hh = new hanghoa();
$result = $hh->getHanghoall();
$count = $result->rowCount();
$limit = 8;
$p = new page();
$page = $p->findPage($count, $limit);
$start = $p->findStart($limit);
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
?>

<!--Section: Examples-->
<?php
if (isset($_GET["act"])) {
    if ($_GET['act'] == "timkiem") {
        $ac = 0;
    }
} else {
    $ac = 1;
}
?>


<section id="examples" class=" text-center  mt-5">
    <!-- Heading -->
    <div class="row">
        <div class="col-lg-8 ">
            <?php
            if ($ac == 1) {
                echo '<h4 class="mb-5 font-weight-bold mt-5">SẢN PHẨM</h4>';
            } else {
                echo '<h4 class="mb-5 font-weight-bold mt-5">SẢN PHẨM TÌM KIẾM</h4>';
            }
            ?>
        </div>
    </div>
    <!--Grid row-->
    <div class="row">
        <?php
        $hh = new hanghoa();
        if ($ac == 1) {
            $result = $hh->getListpageHH($start, $limit);
            // $result = $hh->getHanghoall();
        } else {
            if (isset($_POST['txtsearch'])) {
                $tk = $_POST['txtsearch'];
                $result = $hh->getHoangHoaTimKiem($tk);
            }
        }
        while ($set = $result->fetch()) :
        ?>
            <!--Grid column-->
            <div class="col-lg-3 col-md-4 mb-3 text-left p-3">

                <div class="view overlay z-depth-1-half">
                    <img src="images/<?php echo $set['hinh'] ?>" class="img-fluid" alt="">
                    <div class="mask rgba-white-slight"></div>
                </div>
                <h5 class="my-4 font-weight-bold" style="color:red;">
                    <?php echo number_format($set['dongia']) ?>
                    <sup><u>đ</u></sup>
                </h5>
                <a href="index.php?action=sanpham&act=detail&id=<?php echo $set['mahh']; ?>">
                    <span><?php echo $set['tenhh'] . "-" . $set['mausac'] ?></span></br></a>
                <button class="btn btn-danger" id="may4" value="lap 4">New</button>
                <h5>Số lượt xem:<?php echo $set['soluotxem'] ?></h5>
            </div>
        <?php
        endwhile
        ?>
    </div>
    <!--Grid row-->

</section>


<!-- end sản phẩm mới nhất -->

<!-- Pagination -->
<div class="flex-c-m flex-w w-full p-t-38 m-5">
        <?php
        if ($ac = 1) {
            if ($current_page > 1 && $page > 1) {
                echo '<li><a class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1" href="index.php?action=sanpham&page=' . ($current_page - 1) . '">Prev</a></li> ';
            }
            for ($i = 1; $i <= $page; $i++) {
        ?>
                <li><a class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1" href="index.php?action=sanpham&page=<?php echo $i ?>"><?php echo $i ?></a></li>
        <?php
            }
            if ($current_page < $page && $page > 1) {
                echo '<li><a class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1" href="index.php?action=sanpham&page=' . ($current_page + 1) . '">Next</a></li> ';
            }
        }
        ?>
    </ul>
</div>