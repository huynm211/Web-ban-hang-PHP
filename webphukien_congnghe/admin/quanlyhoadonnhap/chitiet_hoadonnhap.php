<?php
	/*
	table sanpham(id_sanpham, tensp, ...)
	table chitietnhap(id_hoadonnhap, id_sanpham, dongia, soluong)
	*/
	if(isset($_GET['id_hoadonnhap'])) {
		$mahoadon = $_GET['id_hoadonnhap'];
		
		$sql_get_tinhtrang = "select tinhtrang from hoadonnhap where id_hoadonnhap = $mahoadon";
		$tinhtrang = select_query($sql_get_tinhtrang);
		
		$sql = "select sp.hinhanh, sp.id_sanpham, sp.tensp, ct.dongia, ct.soluong, ct.dongia*ct.soluong as thanhtien 
				from sanpham sp, chitietnhap ct 
				where ct.id_sanpham = sp.id_sanpham and ct.id_hoadonnhap = $mahoadon";
		
		$result = select_query($sql);
		
?>
	<a href="?quanly=hoadonnhap&ac=lietke">Quay lại</a>
	</br>
	<center><p style="font-size:20px">
    	ĐƠN HÀNG #<?php echo $mahoadon?> 
    	</br>
    	Tình trạng: <?php echo $tinhtrang[0]['tinhtrang']?> 
    </center></p>
	</br>
    
    <table width="100%" border="1">
    <tr>
        <td style="text-align:center">Sản phẩm</span></td>
        <td style="text-align:center">Tên Sản phẩm</span></td>
        <td style="text-align:center">Số lượng mua</span></td>
        <td style="text-align:center">Đơn giá</span></td>
        <td style="text-align:center">Thành tiền</span></td>         
    </tr>
    
    <?php
        $tongtien = 0;
        
        //Tạo bảng
        foreach($result as $item) {				
            $tongtien += $item['thanhtien'];
    ?>
 
        <tr>                
            <td style="text-align:center">
            	<img src="quanlysanpham/uploads/<?php echo $item['hinhanh']; ?>" width="100" height="100" />
            </td>
            
            <td><?php echo $item['tensp']?></td>
               
            <td style="text-align:center"><?php echo $item['soluong']?></td>    
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
   	 
<?php	
	}
	else {
		echo 'Có lỗi xảy ra với đơn hàng này, vui lòng thử lại sau!';
	}
?>

