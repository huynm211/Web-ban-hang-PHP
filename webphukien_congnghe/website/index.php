<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="../css/website.css"/>
    <script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/tabs.js"></script>
    <title>Web phụ kiện điện thoại</title>
</head>

<body>
	<div class="wrapper">
    	<?php 
			include('../config/config.php');
			include('header.php');
			include('menu.php');
			include('content.php');
			include('footer.php');
		?>
</body>
</html>