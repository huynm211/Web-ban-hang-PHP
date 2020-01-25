
<div class="content">
	<div class="content_left">
		<?php
			if(isset($_SESSION['dangnhap'])) {
				include('left/quanlytaikhoan.php');
				include('left/danhmucloaisp.php');
			}
			else {
				include('left/danhmucloaisp.php');
			}
			
		?>
	</div>
    
	<div class="content_right">
		<?php
			if(isset($_GET['quanly'])){
				$luachon = $_GET['quanly'];
			}else{
				$luachon ='';
			}
			
			switch($luachon) {
				case 'danhsachsanpham':
					include('right/danhsachsanpham.php');
					break;
				
				case 'dangky':
					include('right/dangky.php');
					break;
				
				case 'dangnhap':
					include('right/dangnhap.php');
					break;
				
				case 'capnhatthongtin':
					include('right/capnhatthongtin.php');
					break;
					
				case 'chitietsanpham':
					include('right/chitietsanpham.php');
					break;
					
				case 'quanlygiohang':
					$hanhdong = $_GET['ac'];
					if($hanhdong == 'themsanpham') {
						include('right/quanlygiohang/themsanpham.php');
					}
					
					elseif ($hanhdong == 'xemgiohang') {
						include('right/quanlygiohang/xemgiohang.php');
					}
					
					elseif ($hanhdong == 'xoa') {
						include('right/quanlygiohang/xoasanpham.php');	
					}
					
					break;
					
				case 'quanlydonhang':
					$hanhdong = $_GET['ac'];
					if($hanhdong == 'themdonhang') {
						include('right/quanlydonhang/themdonhang.php');
					}
					
					elseif ($hanhdong == 'lietke_donhang') {
						include('right/quanlydonhang/lietke_donhang.php');
					}
					
					elseif ($hanhdong == 'xemchitietdonhang') {
						include('right/quanlydonhang/chitietdonhang.php');	
					}
					
					elseif ($hanhdong == 'huydonhang') {
						include('right/quanlydonhang/huydonhang.php');	
					}
					
					break;
					
				default:
					$_GET['id_loaisp'] = 1;
					include "right/danhsachsanpham.php";
			}
			
		?>
	</div>
<div class="clear"></div>