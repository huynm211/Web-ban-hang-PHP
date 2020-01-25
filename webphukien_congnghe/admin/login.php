<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/admin-login.css"/>
<title>Đăng nhập vào trang quản trị</title>
</head>

<?php
	session_start();
	include('../config/config.php');
	include('../config/phpAlert.php');
	
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "select loaitaikhoan from nguoidung where tendangnhap='$username' and matkhau='$password' limit 1 ";
		
		global $conn;
		connect_db();
		$query = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($query);
		
		if($result) {
			if($result['loaitaikhoan'] == 1){
				$_SESSION['dangnhap'] = $username;
				header('location:index.php');
			}
		}
		else {
			phpAlert("Tài khoản hoặc mật khẩu không đúng");
			header('location:login.php');
		}
		
	}
?>

<body>
	<div id="login">
		<form action="login.php" method="post" enctype="multipart/form-data">
    	<h2>Đăng nhập</h2>
    	<input type="text" name="username" id="username" placeholder="Enter username..." required="required" />
     	<input type="password" name="password" id="password" placeholder="Enter password..." required="required" />
      	<input type="submit" name="login" id="button" value="Đăng nhập"/>
    	</form>
	</div>
</body>

</html>