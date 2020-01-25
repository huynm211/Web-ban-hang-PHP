<?php

//Người dùng hủy đơn hàng nhập
if(isset($_GET['huydonhang'])) {
	$mahoadon = $_GET['id'];
	$sql = "update hoadonnhap set tinhtrang = 'Đã hủy' where id_hoadonnhap = $mahoadon";
	if(insert_or_update($sql)) {
		echo '<script>alert("Bạn đã hủy đơn hàng nhập số #'.$mahoadon.'")</script>';
		echo "<script type='text/javascript'>
				window.top.location='index.php?quanly=hoadonnhap&ac=lietke';
			</script>";  
	}
}

//Người dùng thanh toán đơn hàng
else {
	$mahoadon = $_GET['id'];
	$sql_get_soluongmua = "select id_sanpham, soluong from chitietnhap where id_hoadonnhap = $mahoadon";
	$result_get_soluongmua = select_query($sql_get_soluongmua);
	if(count($result_get_soluongmua) > 0) {
		//cập nhật tồn kho
		foreach($result_get_soluongmua as $item) {
			$masanpham = $item['id_sanpham'];
			$soluongnhap = $item['soluong'];
			$sql_capnhattonkho = "update sanpham set soluong = soluong + $soluongnhap where id_sanpham = $masanpham";
			if(!insert_or_update($sql_capnhattonkho)) {
				echo 'Có lỗi khi cập nhật tồn kho';
			}
		}//kết thúc cập nhật tồn kho
		
		//cập nhật tình trạng hóa đơn thành 'Đã thanh toán'
		$sql_capnhattinhtrang = "update hoadonnhap set tinhtrang = 'Đã thanh toán', ngaythanhtoan = CURDATE() 
								where id_hoadonnhap = $mahoadon";
		if(insert_or_update($sql_capnhattinhtrang)) {
		echo '<script>alert("Bạn đã thanh toán đơn hàng nhập số #'.$mahoadon.'")</script>';
		echo "<script type='text/javascript'>
				window.top.location='index.php?quanly=hoadonnhap&ac=lietke';
			</script>";  
		}
	}	
	
	else {
		echo '<script>alert("Đơn hàng #'.$mahoadon.' bị lỗi, không thể thanh toán")</script>';
		echo "<script type='text/javascript'>
				window.top.location='index.php?quanly=hoadonnhap&ac=lietke';
			</script>";  
	}	
	
}
?>