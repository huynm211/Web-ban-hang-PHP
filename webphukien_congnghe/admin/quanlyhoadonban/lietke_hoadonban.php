<?php
	$sql = "select 
				ng.id_nguoidung, ng.tennguoidung, hd.id_hoadonban, 
				DATE_FORMAT(hd.ngayhoadon, '%d-%m-%Y') as ngayhoadon, hd.tongtien, hd.tinhtrang, 
				DATE_FORMAT(hd.ngaythanhtoan, '%d-%m-%Y') as ngaythanhtoan 
			from hoadonban hd, nguoidung ng where hd.id_nguoidung = ng.id_nguoidung 
			";
			
	$result = select_query($sql);
	
	if (count($result) > 0) {
		
?>
	<br>
	<p style="text-align:center;font-size:20px;">DANH SÁCH HÓA ĐƠN BÁN</p>
    <br>
    <table width="100%" border="1">
    <tr>
    	<td>Mã đơn hàng</td>
        <td>Tên khách hàng</td>
    	<td>Mã khách hàng</td> 
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
        	<td style="text-align:center">
                <a href="?quanly=hoadonban&ac=chitiethoadon&id_hoadonban=<?php echo $item['id_hoadonban']?>">
                    <?php echo $item['id_hoadonban']?>
                </a>
            </td>
            
            <td><?php echo $item['tennguoidung']?></td>
        	<td style="text-align:center"><?php echo $item['id_nguoidung']?></td>   
            <td><?php echo $item['ngayhoadon']?></td>                 	
            <td><?php echo number_format($item['tongtien'])?></td>    	
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
                	<a href="?quanly=hoadonban&ac=thutien&id_hoadonban=<?php echo $item['id_hoadonban']?>">
                    	Thu tiền
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
<?php
	}//Kết thúc if (count($result) > 0)
	else {
		echo 'Chưa có đơn hàng nào...';
	}
?>

