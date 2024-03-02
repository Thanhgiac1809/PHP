<?php
  session_start();
  // include "Model/connect.php";
  // include "Model/hanghoa.php";
  // include "Model/giohang.php";
  // include "Model/user.php";
  // include "Model/hoadon.php";
  // include "Model/page.php";

  // spl_autoload dung de load len nhung class thiet ke duoi dang huong doi tuong
  // cach 1
  // spl_autoload_register('myModelClassLoader');
  // function myModelClassLoader($className)
  // {
  //   $path='Model/';
  //   include $path.$className.'.php'; // include 'Model/hanghoa.php'
  // }

  // cach 2
  include "Model/class.phpmailer.php";
  set_include_path(get_include_path() . PATH_SEPARATOR . 'Model/');
  spl_autoload_extensions('.php');
  spl_autoload_register();

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body class="animsition">
	<!-- Header -->
	<?php
	include_once "./View/header.php";
	?>
	<!-- Hiện thị nội dung -->
	<?php
	$ctrl = "content";
	if (isset($_GET["action"])) {
		$ctrl = $_GET["action"];
	}
	include "Controller/" . $ctrl . ".php";
	?>
	<!-- Footer -->
	<?php
	include_once "./View/footer.php";
	?>

</body>

</html>