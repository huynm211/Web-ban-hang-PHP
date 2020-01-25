<?php 
	$manguoidung = $_SESSION['dangnhap'];
	$sql = "select tennguoidung, diachi, email, dienthoai from nguoidung where id_nguoidung = $manguoidung";
	$result = select_query($sql);
	
	if(isset($_POST['capnhat'])) {
		$tennguoidung = $_POST['hoten'];
		$diachi = $_POST['diachi'];
		$email = $_POST['email'];
		$dienthoai = $_POST['dienthoai'];
		
		$sql = "update nguoidung 
				set tennguoidung = '$tennguoidung', diachi = '$diachi', email = '$email', dienthoai = '$dienthoai' 
				where id_nguoidung = $manguoidung";
		
		if(insert_or_update($sql)) {
			echo '<script>alert("Cập nhật thông tin thành công")</script>';
			echo "<script type='text/javascript'>
					window.top.location='index.php?quanly=capnhatthongtin';
				</script>"; 
		}
		else {
			echo 'Cập nhật thất bại';	
		}
	}
?>

<!--Form cập nhật thông tin-->
<div class="tieude">
	CẬP NHẬT THÔNG TIN
</div>

<div class="dangky">
	<p style="font-size:18px; color:red;margin:5px;">Các mục(*) là bắt buộc. Vui lòng điền đầy đủ </p>
    
	<form action="" method="post" enctype="multipart/form-data">
	<table width="100%" border="1" style="border-collapse:collapse;">
        <tr>
            <td width="40%">Họ tên <strong style="color:red;"> (*)</strong></td>
            
            <td width="60%">
            	<input type="text" name="hoten" size="50" value="<?php echo $result[0]['tennguoidung']?>" required>
            </td>
        </tr>    
        
        <tr>
            <td>Email  <strong style="color:red;"> (*)</strong></td>
            <td width="60%">
            	<input type="email" name="email" size="50" value="<?php echo $result[0]['email']?>" required>
            </td>
        </tr>
        
        <tr>
            <td>Số điện thoại  <strong style="color:red;"> (*)</strong></td>
            <td width="60%">
            	<input type="tel" name="dienthoai" size="50" value="<?php echo $result[0]['dienthoai']?>" required>
            </td>
        </tr>
        
        <tr>
            <td>Địa chỉ nhận hàng <strong style="color:red;"> (*)</strong></td>
            <td width="60%">
            	<input type="text" name="diachi" size="50" value="<?php echo $result[0]['diachi']?>" required>
            </td>
        </tr>
        
        <tr>
            <td colspan="2">
            	<p><input type="submit" name="capnhat" value="Cập nhật" /></p>
            </td>
        </tr>
        
	</table>
</form>
</div>
<!--Kết thúc Form cập nhật thông tin-->

</br></br>
<?php
	if(isset($_POST['doimatkhau'])) {
		$matkhaucu = $_POST['matkhaucu'];
		$matkhaumoi = $_POST['matkhaumoi'];
		$xacnhanmatkhau = $_POST['xacnhanmatkhau'];
		if($matkhaumoi !== $xacnhanmatkhau) {
			echo 'Mật khẩu mới và phần xác nhận không khớp';	
		}
		else {
			$sql_laymatkhau = "select matkhau from nguoidung where id_nguoidung = $manguoidung and matkhau = $matkhaucu";
			
			$result = select_query($sql_laymatkhau);
			if(count($result) > 0) {
				$sql_doimatkhau = "update nguoidung set matkhau = '$matkhaumoi' where id_nguoidung = $manguoidung";
				if(insert_or_update($sql_doimatkhau)){
					echo 'Đổi mật khẩu thành công';
				}
				else {
					echo 'Có lỗi xảy ra, vui lòng thử lại sau';
				}
			}
			else {
				echo 'Sai mật khẩu';
			}
		}
	}
?>
<!--Form đổi mật khẩu-->
<div class="tieude">
	ĐỔI MẬT KHẨU
</div>

<div class="dangky">
	<p style="font-size:18px; color:red;margin:5px;">Các mục(*) là bắt buộc. Vui lòng điền đầy đủ </p>
    
	<form action="" method="post" enctype="multipart/form-data">
	<table width="100%" border="1" style="border-collapse:collapse;">
        <tr>
            <td>Mật khẩu cũ <strong style="color:red;"> (*)</strong></td>
            <td width="60%"><input type="password" name="matkhaucu" size="50" required></td>
        </tr>
        
        <tr>
            <td>Mật khẩu mới <strong style="color:red;"> (*)</strong></td>
            <td width="60%"><input type="password" name="matkhaumoi" size="50" required></td>
        </tr>
        
        <tr>
            <td>Xác nhận mật khẩu  <strong style="color:red;"> (*)</strong></td>
            <td width="60%"><input type="password" name="xacnhanmatkhau" size="50" required></td>
        </tr>
        
        <tr>
            <td colspan="2">
            	<p><input type="submit" name="doimatkhau" value="Đổi mật khẩu" /></p>
            </td>
        </tr>
        
	</table>
</form>
</div>


