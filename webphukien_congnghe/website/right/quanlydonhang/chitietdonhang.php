<?php
	/*
	table sanpham(id_sanpham, tensp, ...)
	table chitietban(id_hoadonban, id_sanpham, dongia, soluong, thanhtien)
	*/
	$manguoidung = $_SESSION['dangnhap'];
	$magiohang = $_SESSION['id_giohang'];
	if(isset($_GET['id_hoadonban'])) {
		$mahoadon = $_GET['id_hoadonban'];
		
		$sql_get_tinhtrang = "select tinhtrang from hoadonban where id_hoadonban = $mahoadon";
		$tinhtrang = select_query($sql_get_tinhtrang);
		
		$sql = "select sp.hinhanh, sp.id_sanpham, sp.tensp, ct.dongia, ct.soluong, ct.thanhtien 
				from sanpham sp, chitietban ct, hoadonban hd 
				where ct.id_sanpham = sp.id_sanpham and hd.id_hoadonban = ct.id_hoadonban 
						and ct.id_hoadonban = $mahoadon and hd.id_nguoidung = $manguoidung 
				";
		
		$result = select_query($sql);
		if(count($result) > 0) {
		
?>
	<div class="tieude">ĐƠN HÀNG #<?php echo $mahoadon?> (Tình trạng: <?php echo $tinhtrang[0]['tinhtrang']?>)</div>
	
        <div class="box_giohang" >
            <table width="100%" border="1" style="border-collapse:collapse; margin:5px; text-align:center;">
            <tr>
                <td>Sản phẩm</td>
                <td>Tên Sản phẩm</td>
                <td>Số lượng mua</td>
                <td>Đơn giá</td>
                <td>Thành tiền</td>         
            </tr>
            
            <?php
				$tongtien = 0;
				
				//Tạo bảng
            	foreach($result as $item) {				
					$tongtien += $item['thanhtien'];
			?>
         
                <tr>                
                    <td>
                    <img src="../admin/quanlysanpham/uploads/<?php echo $item['hinhanh']; ?>" width="100" height="100" />
                    </td>
                    
                    <td>
                    	<a href="?quanly=chitietsanpham&id_sanpham=<?php echo $item['id_sanpham']?>">
                        	<?php echo $item['tensp']?>
                        </a>
                    </td>
                    
                    <td><?php echo $item['soluong']?></td>    
                    <td><?php echo number_format($item['dongia']) ?></td>
                    <td><?php echo number_format($item['thanhtien']) ?></td>                 
                </tr>        
			<?php
				} //Kết thúc vòng lặp tạo bảng
			?>
            	<tr>
                	<td colspan="4">Tổng tiền</td>
                    <td><?php echo number_format($tongtien)?> VND</td>               
                </tr>
           </table>     
           </br>
           <a href="?quanly=quanlydonhang&ac=lietke_donhang">Quay lại</a>
		</div><!--Kết thúc box_giohang-->
	 
<?php	
		}//Kết thúc if(count($result) > 0) 
		else {
			echo 'Đơn hàng này không tồn tại!';
		}
	}//Kết thúc if(isset($_GET['id_hoadonban']))
	else {
		echo 'Có lỗi xảy ra với đơn hàng này, vui lòng thử lại sau!';
	}
?>

