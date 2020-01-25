<?php
	if(isset($_GET['id_nguoidung'])) {
		$manguoidung = $_GET['id_nguoidung'];
		$sql_get_loaitaikhoan = "select loaitaikhoan from nguoidung where id_nguoidung = $manguoidung";
		
		$result_get_loaitaikhoan = select_query($sql_get_loaitaikhoan);
		
		$loaitaikhoan = $result_get_loaitaikhoan[0]['loaitaikhoan'];
		
		//loaitaikhoan:
		//2: Khách hàng
		//3: Đã bị khóa
		$sql = "";
		if($loaitaikhoan == 2) {
			$sql = "update nguoidung set loaitaikhoan = 3 where id_nguoidung = $manguoidung";
		}
		elseif($loaitaikhoan == 3) {
			$sql = "update nguoidung set loaitaikhoan = 2 where id_nguoidung = $manguoidung";
		}
		
		if(insert_or_update($sql)) {
			header('location:index.php?quanly=taikhoan&ac=lietke');
		}
		else {
			echo 'Khóa/Mở khóa thất bại';	
		}
	}
	
	else {
		echo 'unset $_GET["id_nguoidung"]';
	}
?>