<?php
if(isset($_GET['id_hoadonnhap'])){	
	$mahoadon = $_GET['id_hoadonnhap'];
	
	$sql_tinh_tongtien = "select sum(dongia*soluong) as tongtien from chitietnhap where id_hoadonnhap = $mahoadon";
	$result_tinh_tongtien = select_query($sql_tinh_tongtien);
	if(count($result_tinh_tongtien) > 0){
		$tongtien = $result_tinh_tongtien[0]['tongtien'];
	}
	
	$sql_capnhat_hoadon = "update hoadonnhap set tongtiennhap = $tongtien, tinhtrang = 'Đã xác nhận' 
							where id_hoadonnhap = $mahoadon";
							
	if(insert_or_update($sql_capnhat_hoadon)) {
		echo '<script>alert("Xác nhận đơn hàng thành công")</script>';
		echo "<script type='text/javascript'>
				window.top.location='index.php?quanly=hoadonnhap&ac=lietke';
			</script>"; 
	} 

}
?>