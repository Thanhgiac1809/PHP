<script type="text/javascript">
    function chonsize(a) {
        document.getElementById("size").value = a;

    }
</script>
<section>
    <div class="row">
    </div>
    <article class="col-12">
        <!-- <div class="card"> -->
        <div class="container-fliud">
            <div class="wrapper row">
                <form action="index.php?action=giohang" method="post">
                    <div class="preview col-md-6">
                        <div class="tab-content">
                            <?php
                            if (isset($_GET["id"])) {
                                $id = $_GET["id"];
                                $hh = new hanghoa();
                                $result = $hh->gethanghoaid($id);
                                $hinh = $result["hinh"];
                                $tenhh = $result["tenhh"];
                                $dongia = $result["dongia"];
                            }
                            ?>
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                        </ul>
                    </div>
                    <!-- Product Detail -->
                    <section class="sec-product-detail bg0 p-t-65 p-b-60 mt-5 ml-5">
                        <div class="container">
                            <div class="row">
                            <input type="hidden" name="mahh" value="<?php echo $id;?>" />
                                <div class="col-md-6 col-lg-7 p-b-30">
                                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                                        <div class="wrap-slick3 flex-sb flex-w">
                                            <div class="wrap-slick3-dots"></div>
                                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                                            <div class="slick3 gallery-lb">
                                                <div class="item-slick3" data-thumb="images/<?php echo $hinh ?>">
                                                    <div class="wrap-pic-w pos-relative">
                                                        <img src="images/<?php echo $hinh ?>" alt="IMG-PRODUCT">
                                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/<?php echo $hinh ?>">
                                                            <i class="fa fa-expand"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="item-slick3" data-thumb="images/product-detail-02.jpg">
                                                    <div class="wrap-pic-w pos-relative">
                                                        <img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

                                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
                                                            <i class="fa fa-expand"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="item-slick3" data-thumb="images/product-detail-03.jpg">
                                                    <div class="wrap-pic-w pos-relative">
                                                        <img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

                                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
                                                            <i class="fa fa-expand"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-5 p-b-30">
                                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                            <?php echo $tenhh ?>
                                        </h4>
                                        <span class="mtext-106 cl2">COST
                                            <?php echo number_format($dongia) ?>$
                                        </span>

                                        <p class="stext-102 cl3 p-t-23">
                                            Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare
                                            feugiat.
                                        </p>
                                        <!--  -->
                                        <div class="p-t-33">
                                            <div class="flex-w flex-r-m p-b-10">
                                                <div class="size-203 flex-c-m respon6">
                                                    Size
                                                </div>
                                                <div class="size-204 respon6-next">
                                                    <div class="rs1-select2 bor8 bg0">
                                                        <select class="js-select2" name="size" id="size">
                                                            <option>Choose an option</option>
                                                            <option>Size S</option>
                                                            <option>Size M</option>
                                                            <option>Size L</option>
                                                            <option>Size XL</option>
                                                        </select>
                                                        <div class="dropDownSelect2"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex-w flex-r-m p-b-10">
                                                <div class="size-203 flex-c-m respon6">
                                                    Color
                                                </div>

                                                <div class="size-204 respon6-next">
                                                    <div class="rs1-select2 bor8 bg0">
                                                        <select class="js-select2" name="mymausac" id="mymausac">
                                                            <option>Choose an option</option>
                                                            <option>Red</option>
                                                            <option>Blue</option>
                                                            <option>White</option>
                                                            <option>Grey</option>
                                                        </select>
                                                        <div class="dropDownSelect2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-w flex-r-m p-b-10">
                                                <div class="size-204 flex-w flex-m respon6-next">
                                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                                        </div>

                                                        <input class="mtext-104 cl3 txt-center num-product" type="number" id="soluong" name="soluong" value="1">

                                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                                        </div>
                                                    </div>

                                                    <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                                                        <i class="zmdi zmdi-favorite"></i>
                                                    </a>
                                                </div>

                                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                                                    <i class="fa fa-facebook"></i>
                                                </a>

                                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                                                    <i class="fa fa-twitter"></i>
                                                </a>

                                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>

                                            </div>
                                            <button class="add-to-cart btn btn-default cl0 size-101 bg1 bor1 hov-btn1 p-lr-15  js-addcart-detail" type="submit" data-toggle="modal" data-target="#myModal">
                                                MUA NGAY
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <!-- </div> -->
    </article>
</section>
<?php
    if(isset($_SESSION['makh'])):
?>
<section>
    <div class='col-12'>
        <div class='row'>
            <?php
            if (isset($_GET['id'])) {
                $mahh = $_GET['id'];
                $bl = new binhluan();
                $tong = $bl->getCount($mahh);
            }
            ?>
            <p class="float-left"><b>BÌnh luận: <?php echo $tong; ?></b></p>
            <hr>
        </div>
        <form action="index.php?action=sanpham&act=detail&id=<?php echo $_GET['id']; ?>" method="post">
            <div class="row">

                <input type="hidden" name="txtmahh" value="<?php echo $_GET['id'];?>" />
                <img src="images/people.jpg" width="50px" height="50px" ; />
                <textarea class="input-field" type="text" name="comment" rows="2" cols="70" id="comment" placeholder="Thêm bình luận">  </textarea>
                <input type="submit" class="btn btn-primary" id="submitButton" style="float: right;" value="Bình Luận" />

            </div>
        </form>
        <div class="row">
            <p class="float-left"><b>Các bình luận</b></p>
            <hr>
        </div>
        <div class="row">
            <?php
            $result = $bl->HienThicomment($mahh);
            while ($set = $result->fetch()) :
            ?>
                <div class="col-12">
                    <div class='row'>
                        <img src="images/people.jpg" width="50px" height="50px" alt="">
                        <p><?php echo '<b>' . $set['username'] . ':</b>' . $set['noidung']; ?></p> <br>
                    </div>
                </div>
            <?php
            endwhile;
            ?>
            <br />
        </div>
    </div>
</section>
<?php
    endif;
?>