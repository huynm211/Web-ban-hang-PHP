<?php
	//Gọi từ xemgiohang.php
	$magiohang = $_SESSION['id_giohang'];
	
	//xóa 1 sản phẩm khỏi giỏ hàng
	if(isset($_GET['id_sanpham'])) {
		$masanpham = $_GET['id_sanpham'];
		
		$sql_laysoluongmua = "select soluongmua from chitiet_giohang 
								where id_giohang = $magiohang and id_sanpham = $masanpham";
		
		$result = select_query($sql_laysoluongmua);
		$soluongmua = $result[0]['soluongmua'];
		
		$sql_capnhattonkho = "update sanpham set soluong = soluong + $soluongmua where id_sanpham = $masanpham";
		$sql_xoagiohang = "delete from chitiet_giohang where id_giohang = $magiohang and id_sanpham = $masanpham";
		
		if(insert_or_update($sql_capnhattonkho) && insert_or_update($sql_xoagiohang)) {
			echo "<script type='text/javascript'>
					window.top.location='index.php?quanly=quanlygiohang&ac=xemgiohang';
				</script>"; 
		}
		else {
			echo 'Có lỗi xảy ra, vui lòng thử lại sau!';
		}
	}
	
	
	//xóa toàn bộ sản phẩm
	else {
		$sql_laysoluongmua = "select id_sanpham, soluongmua from chitiet_giohang where id_giohang = $magiohang";
		
		$result = select_query($sql_laysoluongmua);
		foreach($result as $item) {
			$masanpham = $item['id_sanpham'];
			$soluong_trave = $item['soluongmua'];
			$sql_capnhattonkho = "update sanpham set soluong = soluong + $soluong_trave where id_sanpham = $masanpham";
			
			if(!insert_or_update($sql_capnhattonkho)){
				echo 'Xảy ra lỗi trong quá trình cập nhật lại tồn kho';
			}
		}
		
		
		$sql = "delete from chitiet_giohang where id_giohang = $magiohang";
		if(insert_or_update($sql)) {
		echo "<script type='text/javascript'>
				window.top.location='index.php?quanly=quanlygiohang&ac=xemgiohang';
			</script>"; 
		}
		else {
			echo 'Có lỗi xảy ra, vui lòng thử lại sau!';
		}
	}
	
?>