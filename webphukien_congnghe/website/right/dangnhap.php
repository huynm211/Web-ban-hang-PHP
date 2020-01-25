<?php
	@session_start();
	if(isset($_POST['dangnhap'])){
		$tendangnhap = $_POST['tendangnhap'];
		$matkhau = $_POST['matkhau'];
		$sql = "select id_nguoidung, loaitaikhoan 
				from nguoidung 
				where tendangnhap='$tendangnhap' and matkhau='$matkhau' limit 1";
		$result = select_query($sql);
		
		//if(isset($_SESSION['dangnhap'])) {
//			echo '<p>Vui lòng đăng xuất tài khoản trước !</p>';
//			}
//		else{
			if(count($result) > 0) {
				$loaitaikhoan = $result[0]['loaitaikhoan'];
				
				if($loaitaikhoan == 2) {
					$_SESSION['dangnhap'] = $result[0]['id_nguoidung'];

					$makhachhang = $_SESSION['dangnhap'];
					$sql_get_magiohang = "select id_giohang from giohang where id_nguoidung = $makhachhang";
					$result_get_magiohang = select_query($sql_get_magiohang);
					
					$_SESSION['id_giohang'] = $result_get_magiohang[0]['id_giohang'];
					
					echo "<script type='text/javascript'>
					window.top.location='index.php';
					</script>"; 
				}
				elseif ($loaitaikhoan == 1) {
					echo '<p style="text-align:center;width:auto;padding:30px;color:#F00;font-size:20px;">
					Tên đăng nhập hoặc mật khẩu không đúng, vui lòng nhập lại!
				  </p>';
				}
				elseif ($loaitaikhoan == 3) {
					echo '<p style="text-align:center;width:auto;padding:30px;color:#F00;font-size:20px;">
						Tài khoản của bạn đã bị khóa, không thể đăng nhập!
				  	</p>';
				}
				
			}
			else {
				echo '<p style="text-align:center;width:auto;padding:30px;color:#F00;font-size:20px;">
					Tên đăng nhập hoặc mật khẩu không đúng, vui lòng nhập lại!
				  </p>';
				}	
		}
			
	//} 
?>


<div class="tieude">
	VUI LÒNG ĐĂNG NHẬP ĐỂ ĐẶT HÀNG
</div>

<div class="dangky">
    
	<form action="" method="post" enctype="multipart/form-data">
	<table width="100%" border="1" style="border-collapse:collapse;">
       
        <tr>
            <td>Tên đăng nhập <strong style="color:red;"> (*)</strong></td>
            <td width="60%"><input type="text" name="tendangnhap" size="50" required></td>
        </tr>
        
        <tr>
            <td>Mật khẩu  <strong style="color:red;"> (*)</strong></td>
            <td width="60%"><input type="password" name="matkhau" size="50" required></td>
        </tr>
            
        <tr>
            <td colspan="2">
            	<p><input type="submit" name="dangnhap" value="Đăng nhập" /></p>
            </td>
        </tr>
        
	</table>
</form>
	</br>
	<p>Bạn chưa có tài khoản? <a href="index.php?quanly=dangky" style="color:red">Đăng ký ngay</a></p>

</div>

	

