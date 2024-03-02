<?php
$act = 'forgetps';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'forgetps':
        # code...
        include './View/forgetpassword.php';
        break;

    case 'forgetps_action':
        # code...
        if (isset($_POST['submit_email'])) {
            $email = $_POST['email'];
            $usr = new user();
            $checkemail = $usr->getEmail($email);
            if ($checkemail != false) {
                $code = random_int(1000, 10000);
                $item = array(
                    'code' => $code,
                    'email' => $email,
                );

                //lưu vào Session
                $_SESSION['email'][] = $item;

                $mail = new PHPMailer;
                $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
                $mail->Host = 'smtp.gmail.com';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
                $mail->Port = 587;                                //Sets the default SMTP server port
                $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
                $mail->Username = 'giacphan09@gmail.com';                    //Sets SMTP username
                $mail->Password = 'ckswxccmyplswyyk'; //Phplytest20@php					//Sets SMTP password
                $mail->SMTPSecure = 'tls';                            //Sets connection prefix. Options are "", "ssl" or "tls"
                $mail->From = 'begiac12@gmail.com';                    //Sets the From email address for the message
                $mail->FromName = 'Your Code Change IS';                //Sets the From name of the message
                $mail->AddAddress($email,'user');        //Adds a "To" address
                //$mail->AddCC($_POST["email"], $_POST["name"]);	//Adds a "Cc" address
                $mail->WordWrap = 50;                            //Sets word wrapping on the body of the message to a given number of characters
                $mail->IsHTML(true);                            //Sets message type to HTML				
                $mail->Subject = 'Reset Password';                //Sets the Subject of the message
                $mail->Body = 'Cấp mã code ' . $code;
                if ($mail->Send())                                //Send an Email. Return true on success or false on error
                {
                    $error = '<alert>Gửi mail thành công</alert>';
                    include "./View/resetpw.php";
                } else {
                    $error = '<alert>Gửi mail không thành công!</alert>';
                    include "./View/forgetpassword.php";
                }
            } else {
                echo "<script> alert('Địa chỉ Email không tồn tại!'); </script>";
                include "./View/forgetpassword.php";
            }
        }
       

    case 'resetps':
        if (isset($_POST['submit_password'])) {
            $codeold = $_POST['password'];
            //kt code ng dùng nhập có tồn tại hay kh
            foreach ($_SESSION['email'] as $key => $item) {
                if ($item['code'] == $codeold) {
                    $flag=true;
                    $cdau = "GFR5%";
                    $csau = "!2*GH";
                    $codenew = md5($cdau . $codeold . $csau);
                    $emailold=$item['email'];
                    //tiến hành update
                    $usr=new user();
                    $usr->getUpdateemail($emailold,$codenew);
                    include "./View/login.php";
                }
            }
            if($flag==false){
                echo "<script> alert('COde không đúng!'); </script>";
                include "./View/resetpw.php";
            }
        }
}
