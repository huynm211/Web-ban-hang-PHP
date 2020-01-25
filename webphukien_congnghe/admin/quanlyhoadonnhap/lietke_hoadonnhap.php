<?php
	$sql = "select hd.id_hoadonnhap, ncc.tenncc, DATE_FORMAT(hd.ngaynhap, '%d-%m-%Y') as ngayhoadon,
			hd.tongtiennhap, hd.tinhtrang, DATE_FORMAT(hd.ngaythanhtoan , '%d-%m-%Y') as ngaythanhtoan 
			from nhacungcap ncc, hoadonnhap hd where ncc.id_ncc = hd.id_ncc 
			";
			
	$result = select_query($sql);
	
	if (count($result) > 0) {
		
?>
	<br>
	<p style="text-align:center;font-size:20px;">DANH SÁCH HÓA ĐƠN NHẬP</p>
    <br>
    <div class="button_them">
	<a href="index.php?quanly=hoadonnhap&ac=them">Thêm Mới</a> 
	</div>
    <table width="100%" border="1">
    <tr>
    	<td>Mã hóa đơn</td>
        <td>Nhà cung cấp</td>
        <td>Ngày hóa đơn</td>
        <td>Tổng tiền</td>
        <td>Tình trạng</td>
        <td>Ngày thanh toán</td>
        <td colspan="2" style="text-align:center">Cập nhật</td>
    </tr>
    
    <?php
        //Tạo bảng
        foreach($result as $item) {				
    ?>
 
        <tr>                       
            <td style="text-align:center">
                <a href="?quanly=hoadonnhap&ac=chitiet&id_hoadonnhap=<?php echo $item['id_hoadonnhap']?>">
                    <?php echo $item['id_hoadonnhap']?>
                </a>
            </td>
            <td><?php echo $item['tenncc']?></td>           
            <td><?php echo $item['ngayhoadon']?></td>                 	
            <td><?php echo number_format($item['tongtiennhap'])?></td>    	
            <td><?php echo $item['tinhtrang']?></td>      
            
            <!--Hiển thị dữ liệu cho cột "Ngày thu tiền"-->
            <?php
           	if($item['ngaythanhtoan'] !== '00-00-0000') {
			?>
            	<td><?php echo $item['ngaythanhtoan']?></td>   
           	<?php
            }
            elseif($item['tinhtrang'] == 'Đã hủy') {
            ?>
            	<td>Đã hủy</td>
            <?php
            }
            else {
            ?>
            	<td>Chưa thanh toán</td>
            <?php
            } 
            ?>  
            <!--Kết thúc hiển thị dữ liệu cho cột "Ngày thu tiền"-->
            
            <!--Hiển thị dữ liệu cho cột "Cập nhật"-->
            <?php
            if($item['tinhtrang'] == 'Đã xác nhận'){
            ?>
            	<td>
                	<a href="?quanly=hoadonnhap&ac=capnhattinhtrang&huydonhang=1&id=<?php echo $item['id_hoadonnhap']?>">
                    	Hủy đơn hàng
                    </a>
                </td>
                
            	<td>
                	<a href="?quanly=hoadonnhap&ac=capnhattinhtrang&thanhtoan=1&id=<?php echo $item['id_hoadonnhap']?>">
                    	Thanh toán
                    </a>
                </td>
            <?php
            }
            else {
            ?>
            	<td>&nbsp;</td>
                <td>&nbsp;</td>
            <?php
            } 
            ?>
            <!--Kết thúc hiển thị dữ liệu cho cột "Cập nhật"-->
                   
        </tr>       
<?php	
		}//Kết thúc foreach tạo bảng
?>		
		</table>
<?php
	}//Kết thúc if (count($result) > 0)
	else {
		echo 'Chưa có đơn hàng nào...';
	}
?>

