<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="../js/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="../js/tinymce/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

<link rel="stylesheet" type="text/css" href="../css/admin.css"/>

<title>Trang quản trị viên</title>
</head>
<?php
 session_start();
 if(!isset($_SESSION['dangnhap'])){
	 header('location:login.php');
 }
?>

<body>
	<div class="wrapper">
	<?php 
		include('../config/phpAlert.php');
		include('../config/config.php');
		include('header.php');
		include('menu.php');
		include('content.php');
		include('footer.php');
	?>
   
</div>
</body>
</html>