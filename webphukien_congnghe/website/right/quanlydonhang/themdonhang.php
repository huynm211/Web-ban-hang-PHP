<?php 
//	$date = getdate();  //ngày 01 tháng 12 năm 2019
//
//  echo "Thứ: ".$date['weekday']."<hr>";	=> Sunday
//  echo "Ngày: ".$date['mday']."<hr>";		=> 01
//  echo "Tháng: ".$date['mon']."<hr>";		=> 12
//  echo "Năm: ".$date['year']."<hr>";		=> 2019
//  echo "Giờ: ".$date['hours']."<hr>";	
//  echo "Phút: ".$date['minutes']."<hr>";
//  echo "Giây: ".$date['seconds']."<hr>";

	//Chức năng Thêm đơn hàng
//	B1: Thêm mới hóa đơn (cột id_nguoidung, ngayhoadon) . Cột id_hoadonban tự tăng
//	B2: Lấy mã hóa đơn dựa theo id người dùng lưu trong SESSION và tình trạng = ''
//	B3: Lấy dữ liệu từ chi tiết giỏ hàng dựa vào id giỏ hàng lưu trong SESSION
//	B4: Đưa dữ liệu vừa lấy dc vào bảng chi tiết bán (chi tiết đơn hàng) đồng thời tính tổng tiền phải thanh toán
//	B5: Cập nhật lại tổng tiền và tình trạng hóa đơn đồng thời xóa dữ liệu trong chi tiết giỏ hàng

	$manguoidung = $_SESSION['dangnhap'];
	$magiohang = $_SESSION['id_giohang'];
	
	if(isset($_GET['themdonhang'])) {
		//B1: Thêm mới hóa đơn (đơn hàng)
		$sql_themhoadon = "insert into hoadonban(id_nguoidung, ngayhoadon) values($manguoidung, CURDATE())";
		
		if(!insert_or_update($sql_themhoadon)) {
			echo 'Có lỗi xảy ra khi thêm đơn hàng';
		}
		
		//B2: Lấy mã hóa đơn
		$sql_get_mahoadon = "select id_hoadonban from hoadonban where id_nguoidung = $manguoidung and tinhtrang = '' ";
		$result_get_mahoadon = select_query($sql_get_mahoadon);
		
		//Nếu lấy dc mã hóa đơn thì tiến hành lấy dữ liệu từ chitiet_giohang đưa vào chitietban
		if(count($result_get_mahoadon) > 0) {
			$mahoadon = $result_get_mahoadon[0]['id_hoadonban'];
			
			//B3: Lấy dữ liệu trong chitiet_giohang ứng với id_giohang được lưu trong SESSION
			$sql_lay_chitiet_giohang = "select id_sanpham, dongia, soluongmua, thanhtien 
										from chitiet_giohang where id_giohang = $magiohang";
			
			$result_chitiet_giohang = select_query($sql_lay_chitiet_giohang);
			
			//B4: Đưa dữ liệu vào chitietban
			$tongtien = 0;
			foreach($result_chitiet_giohang as $item) {
				$masanpham = $item['id_sanpham'];
				$dongia = $item['dongia'];
				$soluong = $item['soluongmua'];
				$thanhtien = $item['thanhtien'];
				
				$sql_them_chitiet_donhang = "insert into 
												chitietban(id_hoadonban, id_sanpham, dongia, soluong, thanhtien) 
											values
														($mahoadon, $masanpham, $dongia, $soluong, $thanhtien)";
				
				if(!insert_or_update($sql_them_chitiet_donhang)) {
					echo 'Có lỗi xảy ra khi thêm chi tiết đơn hàng';
				}
				
				$tongtien += $thanhtien; //Tính tổng tiền để cập nhật cột tongtien cho hóa đơn bán
			}//Kết thúc đưa dữ liệu vào chitietban
	
			//	B5: Cập nhật lại tổng tiền và tình trạng hóa đơn
			$sql_capnhat_hoadon = "update hoadonban 
									set tongtien = $tongtien, tinhtrang = 'Đã xác nhận' 
									where id_hoadonban = $mahoadon";
			
			$sql_xoa_chitietgiohang = "delete from chitiet_giohang where id_giohang = $magiohang";
			
			if(insert_or_update($sql_capnhat_hoadon) && insert_or_update($sql_xoa_chitietgiohang)) {
				echo 'Xác nhận đơn hàng thành công. Cảm ơn bạn đã mua hàng! </br>';
				echo '<a href="?quanly=quanlydonhang&ac=lietke_donhang" style="color:red">Kiểm tra đơn hàng </a> 
				hoặc <a href="index.php" style="color:red">Tiếp tục mua sắm</a>';
				
			}
			
			
		}//Kết thúc lấy mã hóa đơn if(count($result_get_mahoadon) > 0)
		
	}//Kết thúc if(isset($_GET['themdonhang']))
	else {
		echo 'Xác nhận đơn hàng thành công. Cảm ơn bạn đã mua hàng! </br>';
		echo '<a href="?quanly=quanlydonhang&ac=lietke_donhang" style="color:red">Kiểm tra đơn hàng </a> 
		hoặc <a href="index.php" style="color:red">Tiếp tục mua sắm</a>';
	}
	
?>