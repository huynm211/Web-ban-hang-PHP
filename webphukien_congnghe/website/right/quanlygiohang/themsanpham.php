<?php
	//Nhận dữ liệu từ website/right/chitietsanpham.php
	
	$manguoidung = $_SESSION['id_nguoidung'];
	$masanpham = $_SESSION['id_sanpham'];
	$giasanpham = $_SESSION['giasp'];
	$soluongmua = $_SESSION['soluongmua'];
	
	$sql_idgiohang = "select id_giohang from giohang where id_nguoidung = $manguoidung limit 1";
	$result_idgiohang = select_query($sql_idgiohang);
	
	//Kiểm tra xem giỏ hàng của người dùng có tồn tại không
	if(count($result_idgiohang) > 0) {
		$magiohang = $result_idgiohang[0]['id_giohang'];	
		
		//Kiểm tra xem sản phẩm đã có trong chi tiết giỏ hàng hay chưa
		$sql_checksanpham = "select id_sanpham from chitiet_giohang where id_sanpham = $masanpham";
		$check = select_query($sql_checksanpham);
		
		//Nếu sản phẩm đã có rồi thì chỉ cập nhật lại số lượng trong chi tiết giỏ hàng
		if(count($check) > 0) {
			$sql_capnhatsoluong = "update chitiet_giohang 
								set soluongmua = soluongmua + $soluongmua 
								where id_giohang = $magiohang and id_sanpham = $masanpham";
			
			$sql_capnhattonkho = "update sanpham set soluong = soluong - $soluongmua where id_sanpham = $masanpham";
			
			if(insert_or_update($sql_capnhatsoluong) && insert_or_update($sql_capnhattonkho)) {
				echo 'Thêm sản phẩm vào giỏ hàng thành công! <a href="index.php?quanly=quanlygiohang&ac=xemgiohang" style="color:red">Thanh toán ngay</a> hoặc <a href="index.php?quanly=danhsachsanpham?id_loaisp=1" style="color:red">tiếp tục mua sắm</a>';	
			}
		}//Kết thúc cập nhật
		
		//Nếu chưa có sản phẩm thì thêm 1 dòng mới trong chi tiết giỏ hàng và cập nhật tồn kho sản phẩm
		else {
			$thanhtien = $giasanpham * $soluongmua;
		
			$sql_themvaogio = "insert into chitiet_giohang(id_giohang, id_sanpham, dongia, soluongmua, thanhtien)
											values($magiohang, $masanpham, $giasanpham, $soluongmua, $thanhtien)";
			
			$sql_capnhattonkho = "update sanpham set soluong = soluong - $soluongmua where id_sanpham = $masanpham";
			
			if(insert_or_update($sql_themvaogio) && insert_or_update($sql_capnhattonkho)) {
				echo 'Thêm sản phẩm vào giỏ hàng thành công! <a href="index.php?quanly=quanlygiohang&ac=xemgiohang" style="color:red">Thanh toán ngay</a> hoặc <a href="index.php?quanly=danhsachsanpham?id_loaisp=1" style="color:red">tiếp tục mua sắm</a>';	
			} 
		}//Kết thúc thêm mới vào chi tiết giỏ hàng
		
	}//Kết thúc kiểm tra giỏ hàng tồn tại
	
	else {
		echo 'Có lỗi xảy ra, vui lòng thử lại sau!';
	}
?>