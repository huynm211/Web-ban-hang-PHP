<?php
	if(isset($_POST['logout'])){
		unset($_SESSION['dangnhap']);
		unset($_SESSION['id_giohang']);
		session_destroy();
		header('location:index.php');
	}
	
	if(isset($_SESSION['dangnhap'])) {
		$id_nguoidung = $_SESSION['dangnhap'];
		$sql = "select tennguoidung from nguoidung where id_nguoidung = $id_nguoidung";
		$result = select_query($sql);
		if(count($result) > 0) {
?>
			<div class = "box_list">
				<div class = "tieude"><h3>Tài khoản</h3></div>
				<ul class = "list">
					<li>Xin chào <b><?php echo $result[0]["tennguoidung"] ?>!</b></li>
					<li><a href="?quanly=capnhatthongtin">Cập nhật thông tin</a></li>
					<li><a href="?quanly=quanlygiohang&ac=xemgiohang">Quản lý giỏ hàng</a></li>
                    <li><a href="?quanly=quanlydonhang&ac=lietke_donhang">Quản lý đơn hàng</a></li>
                  
					<form action="" method="post" enctype="multipart/form-data">
            			<center>
                        	<input type="submit" name="logout"
                         	value="Đăng xuất" style="background:#06F; color:#fff;width:200px; height:30px;" />
                        </center>
            		</form>
				</ul>
			</div>
       
<?php
    	}
	}
	else{
		echo '<div class = "tieude"><h3>Tài khoản</h3></div>';
		echo '<p>Bạn chưa đăng nhập</p>';
		}

?>

