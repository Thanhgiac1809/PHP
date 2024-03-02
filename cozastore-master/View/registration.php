<!--  -->
<div class="container mb-5 " style="margin-top: 200px;">

    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-5 well well-sm col-md-offset-4">
            <legend><a href="http://hocwebgiare.com/"><i class="glyphicon glyphicon-globe"></i></a> Đăng ký thành viên!
            </legend>
            <?php
            //$_SERVER["PHP_SEFT"]: trả về tên file của hiện tại
            // $_SERVER["PHP_SEFT"] sẽ gửi dữ liệu form đến chính nó thay vì nhảy qua trang khác
            // htmlspecialchar()? chuyern các ký tự đặc biệt htafnh các thực thể HTML, nó sẽ thay
            // thế các ký tự HTML như <and> &lt &gt;
            //   khai báo biến 
            $name = $email = $diachi = $phone = $pass = $repass = $tdn = "";
            $nameErr = $emailErr = $codeErr = $phoneErr = $passErr = $genderErr = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                //kiểm tra name
                if (empty($_POST['txttenkh'])) {
                    $nameErr = "Tên Khách hàng không được rỗng";
                } else { //mss12345
                    $name = $_POST['txttenkh'];
                    if (!preg_match("/[^0-9]$/", $name)) {
                        $nameErr = "Tên khách hàng là ký tự";
                    }
                }

                //Địa chỉ
                if (empty($_POST['txtdiachi'])) {
                    $diachiErr = "Địa chỉ không được rỗng";
                }
                if (empty($_POST['txtusername'])) {
                    $tdnErr = "tên đăng nhập không được rỗng";
                }
                if (empty($_POST['repass'])) {
                    $repassErr = "nhập lại mật khẩu k được để rỗng không được rỗng";
                }
                //kiểm tra email
                if (empty($_POST['txtemail'])) {
                    $emailErr = "Email không được rỗng";
                } else { //mss12345
                    $email = $_POST['txtemail'];
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Email chưa đúng định dạng";
                    }
                }
                // kiểm tra số đt
                if (empty($_POST['txtsodt'])) {
                    $phoneErr = "Phone không được rỗng";
                } else { //mss12345
                    $phone = $_POST['txtsodt'];
                    if (!preg_match("/^[0]{1}\d{9,10}$/", $phone)) {
                        $phoneErr = "Phone phải có số 0 và từ 10-11 số";
                    }
                }
                //kiểm tra pass;Tqwety4$
                if (empty($_POST['txtpass'])) {
                    $passErr = "Pass không được rỗng";
                } else { //mss12345
                    $pass = $_POST['txtpass'];
                    if (!preg_match("/^[A-Z]{1}([\w\.@$%^&*()]+){7}$/", $pass)) {
                        $passErr = "Pass chưa đúng định dạng";
                    }
                }
            }
            ?>
            <form action="index.php?action=dangky&act=inset_item " method="post" class="form" role="form">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">

                    <div class="row">
                        <div class="col-xs-4 col-md-4"> <label for="email">Tên Khách Hàng:</label>
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <input class="form-control" type="text" name="txttenkh" id="" value="<?php if (isset($name)) echo $name ?>">
                            <span class="error"><?php if (isset($nameErr)) echo $nameErr; ?></span>
                        </div>
                        <div class="col-xs-4 col-md-4"> <label for="email">Địa chỉ:</label>
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <input class="form-control" type="text" name="txtdiachi" id="" value="<?php if (isset($diachi)) echo $diachi ?>">
                            <span class="error"><?php if (isset($diachiErr)) echo $diachiErr; ?></span>
                        </div>
                        <div class="col-xs-4 col-md-4"> <label for="email">Số Điện Thoại:</label>
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <input class="form-control" type="text" name="txtsodt" id="" value="<?php if (isset($phone)) echo $phone ?>">
                            <span class="error">*<?php if (isset($phoneErr)) echo $phoneErr; ?></span>
                        </div>
                        <div class="col-xs-4 col-md-4"><label for="email">Tên Đăng Nhập:</label>
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <input class="form-control" type="text" name="txtusername" id="" value="<?php if (isset($tdn)) echo $tdn ?>">
                            <span class="error"><?php if (isset($tdnErr)) echo $tdnErr; ?></span>
                        </div>
                    </div><label for="email">Email:</label>
                    <input class="form-control" type="text" name="txtemail" id="" value="<?php if (isset($email)) echo $email ?>">
                    <span class="error"><?php if (isset($emailErr)) echo $emailErr; ?></span>
                    <label for="email">mật khẩu:</label>
                    <input class="form-control" type="password" name="txtpass" id="" value="<?php if (isset($pass)) echo $pass ?>">
                    <span class="error"><?php if (isset($passErr)) echo $passErr; ?></span>
                    <label for="email">nhập lại mật khâu:</label>
                    <input class="form-control" type="password" name="retypepassword" id="" value="<?php if (isset($repass)) echo $repass ?>">
                    <span class="error"><?php if (isset($repassErr)) echo $repassErr; ?></span>
                    <button class="btn btn-lg btn-primary btn-block" type="submit"> Đăng ký</button>

                    <!-- submit -->
                </form>
            </form>
        </div>
    </div>
</div>