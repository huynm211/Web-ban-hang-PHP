<div class="content">
	<div class="box_contains">
		<?php
			if (isset($_GET['quanly']) && isset($_GET['ac'])) {
				$luachon = $_GET['quanly'];
				$hanhdong = $_GET['ac'];
			} else{
				$luachon = '';
				$hanhdong = '';
			}
			
			switch($luachon){
				case 'taikhoan':
					if($hanhdong == 'lietke') {
						include('quanlytaikhoan/lietke_taikhoan.php');
					}
					elseif($hanhdong == 'capnhatloaitaikhoan') {
						include('quanlytaikhoan/capnhat_loaitaikhoan.php');
					}
					else {
						//$hanhdong == 'thutien'
						
					}
					break;
					
				case 'sanpham':
					if($hanhdong == 'lietke') {
						include('quanlysanpham/lietke_sanpham.php');
					}
					elseif($hanhdong == 'them') {
						include('quanlysanpham/them_sanpham.php');
					}
					else {
						include('quanlysanpham/capnhat_sanpham.php');
					}
					break;
					
					
				case 'loaisp':
					if($hanhdong == 'lietke') {
						include('quanlyloaisanpham/lietke_loaisp.php');
					}
					elseif($hanhdong == 'them') {
						include('quanlyloaisanpham/them_loaisp.php');
					}
					else {
						include('quanlyloaisanpham/capnhat_loaisp.php');
					}
					break;
				
				case 'nhacungcap':
					if($hanhdong == 'lietke') {
						include('quanlynhacungcap/lietke_nhacungcap.php');
					}
					elseif($hanhdong == 'them') {
						include('quanlynhacungcap/them_nhacungcap.php');
					}
					else {
						include('quanlynhacungcap/capnhat_nhacungcap.php');
					}
					break;
				
				case 'hoadonnhap':
					if($hanhdong == 'lietke') {
						include('quanlyhoadonnhap/lietke_hoadonnhap.php');
					}
					elseif($hanhdong == 'chitiet') {
						include('quanlyhoadonnhap/chitiet_hoadonnhap.php');
					}
					
					elseif($hanhdong == 'capnhattinhtrang') {
						include('quanlyhoadonnhap/capnhat_tinhtrang.php');
					}
					
					elseif($hanhdong == 'them') {
						include('quanlyhoadonnhap/themhoadonnhap/chon_nhacungcap.php');
					}
					elseif($hanhdong == 'xacnhan') {
						include('quanlyhoadonnhap/themhoadonnhap/xacnhan_donhang.php');
					}
					
					
					break;
				
				case 'hoadonban':
					if($hanhdong == 'lietke') {
						include('quanlyhoadonban/lietke_hoadonban.php');
					}
					elseif($hanhdong == 'chitiethoadon') {
						include('quanlyhoadonban/chitiet_hoadonban.php');
					}
					else {
						//$hanhdong == 'thutien'
						include('quanlyhoadonban/thutien_hoadonban.php');
					}
					break;
					
				default:
					include('quanlysanpham/lietke_sanpham.php');
				
			}

					
		?>
        
	</div>
</div>
