<?php
	if(isset($_GET['id_hoadonban'])) {
		$mahoadon = $_GET['id_hoadonban'];
		
		//lấy số lượng của từng sản phẩm trong đơn hàng
		$sql_get_soluong = "select id_sanpham, soluong from chitietban where id_hoadonban = $mahoadon";
		$result_get_soluong = select_query($sql_get_soluong);
		
		//Cập nhật lại tồn kho
		foreach($result_get_soluong as $item) {
			$soluong_trave = $item['soluong'];
			$masanpham = $item['id_sanpham'];
			
			$sql_capnhat_tonkho = "update sanpham set soluong = soluong + $soluong_trave where id_sanpham = $masanpham";	
			
			if(!insert_or_update($sql_capnhat_tonkho)) {
				echo 'Có lỗi xảy ra khi cập nhật lại tồn kho';
			}
		}
		
		//Cập nhật lại tình trạng hóa đơn
		$sql = "update hoadonban set tinhtrang = 'Đã hủy' where id_hoadonban = $mahoadon";
		if(insert_or_update($sql)) {
			echo '<script>alert("Bạn đã hủy đơn hàng #'.$mahoadon.'")</script>';
			echo "<script type='text/javascript'>
					window.top.location='index.php?quanly=quanlydonhang&ac=lietke_donhang';
				</script>"; 
		}
		else {
			echo 'Có lỗi xảy ra khi hủy đơn hàng, vui lòng thử lại sau !';	
		}
	}
	else {
		echo 'unset $_GET["id_hoadonban"]';	
	}
?>