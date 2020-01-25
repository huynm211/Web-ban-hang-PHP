<?php
if(isset($_POST['dangky'])){
	$tenkh = $_POST['hoten'];
	$tendangnhap = $_POST['tendangnhap'];
	$matkhau = $_POST['matkhau'];
	$email = $_POST['email'];
	$dienthoai = $_POST['dienthoai'];
	$diachi = $_POST['diachi'];
	
	$sql_kiemtra = "select tendangnhap from nguoidung where tendangnhap = '$_POST[tendangnhap]'";
	$kiemtra = select_query($sql_kiemtra);
	if(count($kiemtra) > 0) {
		echo '<h3 style="margin-left:5px;">
				Tên đăng nhập bạn chọn đã tồn tại trong hệ thống. Vui lòng sử dụng tên khác
			 </h3> </br>';
	}
	else {
		$sql = "insert into
				nguoidung(tendangnhap, matkhau, tennguoidung, diachi, email, dienthoai, loaitaikhoan)
			values
					('$tendangnhap', '$matkhau', '$tenkh', '$diachi', '$email', '$dienthoai', 2)
			";
			
		if(insert_or_update($sql)) {
			//Sau khi thêm mới 1 tài khoản thì tự tạo cho tài khoản đó  giỏ hàng
			//B1: Lấy mã tài khoản vừa tạo
			$sql_get_manguoidung = "select id_nguoidung from nguoidung 
									where tendangnhap = '$tendangnhap' and matkhau = '$matkhau'";
			$result_get_manguoidung = select_query($sql_get_manguoidung);
			$manguoidung = $result_get_manguoidung[0]['id_nguoidung'];
			
			//B2: insert vào bảng giỏ hàng mã tài khoản vừa lấy dc
			$sql_them_giohang = "insert into giohang(id_nguoidung) values($manguoidung)";
			
			if(insert_or_update($sql_them_giohang)) {
				echo '<h3 style="margin-left:5px;">Bạn đã đăng ký thành công</h3>';
				echo '<a href="?quanly=dangnhap" style="margin:20px;text-decoration:none;">
						<u>Quay lại để đăng nhập mua hàng</u>
					 </a> </br>';
			}
			else {
				echo '<script>console.log("Có lỗi khi thêm giỏ hàng")</script>';
			}
			
		}
		else {
			echo '<script>console.log("Có lỗi xảy ra khi thêm tài khoản")</script>';
		}
		
	}
	
}
?>

<div class="tieude">
	ĐĂNG KÝ TÀI KHOẢN
</div>

<div class="dangky">
	<p style="font-size:18px; color:red;margin:5px;">Các mục(*) là bắt buộc. Vui lòng điền đầy đủ </p>
    
	<form action="" method="post" enctype="multipart/form-data">
	<table width="100%" border="1" style="border-collapse:collapse;">
        <tr>
            <td width="40%">Họ tên <strong style="color:red;"> (*)</strong></td>
            <td width="60%"><input type="text" name="hoten" size="50" required></td>
        </tr>
        
        <tr>
            <td>Tên đăng nhập <strong style="color:red;"> (*)</strong></td>
            <td width="60%"><input type="text" name="tendangnhap" size="50" required></td>
        </tr>
        
        <tr>
            <td>Mật khẩu  <strong style="color:red;"> (*)</strong></td>
            <td width="60%"><input type="password" name="matkhau" size="50" required></td>
        </tr>
        
        <tr>
            <td>Email  <strong style="color:red;"> (*)</strong></td>
            <td width="60%"><input type="email" name="email" size="50" required></td>
        </tr>
        
        <tr>
            <td>Số điện thoại  <strong style="color:red;"> (*)</strong></td>
            <td width="60%"><input type="tel" name="dienthoai" size="50" required></td>
        </tr>
        
        <tr>
            <td>Địa chỉ nhận hàng <strong style="color:red;"> (*)</strong></td>
            <td width="60%"><input type="text" name="diachi" size="50" required></td>
        </tr>
        
        <tr>
            <td colspan="2">
            	<p><input type="submit" name="dangky" value="Đăng ký" /></p>
            </td>
        </tr>
        
	</table>
</form>
</div>


