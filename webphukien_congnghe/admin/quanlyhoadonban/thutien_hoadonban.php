<?php
	if(isset($_GET['id_hoadonban'])) {
		$mahoadon = $_GET['id_hoadonban'];
		$sql_capnhattinhtrang = "update hoadonban 
								set tinhtrang = 'Đã thu tiền', ngaythanhtoan = CURDATE() 
								where id_hoadonban = $mahoadon";
		if(insert_or_update($sql_capnhattinhtrang)) {
			echo '<script>alert("Bạn đã thu tiền đơn hàng #'.$mahoadon.'")</script>';
			echo "<script type='text/javascript'>
					window.top.location='index.php?quanly=hoadonban&ac=lietke';
				</script>"; 
		}
		else {
			echo 'Có lỗi khi cập nhật';
		}
	}
	else {
		echo 'unset $_GET["id_hoadonban"]';
	}
?>