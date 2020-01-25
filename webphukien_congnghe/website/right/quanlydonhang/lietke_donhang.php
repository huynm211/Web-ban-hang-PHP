<?php
	
	$manguoidung = $_SESSION['dangnhap'];
	$sql = "select id_hoadonban, DATE_FORMAT(ngayhoadon, '%d-%m-%Y') as ngayhoadon, 
					tongtien, tinhtrang, DATE_FORMAT(ngaythanhtoan, '%d-%m-%Y') as ngaythanhtoan
			from hoadonban where id_nguoidung = $manguoidung";
			
	$result = select_query($sql);
	
	if (count($result) > 0) {
		
?>
	<div class="tieude">Danh sách đơn hàng</div>
	
    <div class="box_giohang" >
    <table width="100%" border="1" style="border-collapse:collapse; margin:5px; text-align:center;">
    <tr>
        <td>Mã đơn hàng</td>
        <td>Ngày tạo</td>
        <td>Tổng tiền</td>
        <td>Tình trạng</td>
        <td>Ngày thu tiền</td>
        <td>Cập nhật</td>
    </tr>
    
    <?php
        //Tạo bảng
        foreach($result as $item) {				
    ?>
 
        <tr>                
            <td>
                <a href="?quanly=quanlydonhang&ac=xemchitietdonhang&id_hoadonban=<?php echo $item['id_hoadonban']?>">
                    <?php echo $item['id_hoadonban']?>
                </a>
            </td>
            
            <td><?php echo $item['ngayhoadon']?></td>                 	
            <td><?php echo number_format($item['tongtien'])?> VND</td>    	
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
            	<td>Chưa thu</td>
            <?php
            } 
            ?>  
            <!--Kết thúc hiển thị dữ liệu cho cột "Ngày thu tiền"-->
            
            <!--Hiển thị dữ liệu cho cột "Cập nhật"-->
            <?php
            if($item['tinhtrang'] == 'Đã xác nhận'){
            ?>
            	<td>
                	<a href="?quanly=quanlydonhang&ac=huydonhang&id_hoadonban=<?php echo $item['id_hoadonban']?>">
                    	Hủy đơn hàng
                    </a>
                </td>
            <?php
            }
            else {
            ?>
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
    	</div><!--Kết thúc box_giohang-->
<?php
	}//Kết thúc if (count($result) > 0)
	else {
		echo 'Bạn chưa có đơn hàng nào...';
	}
?>

