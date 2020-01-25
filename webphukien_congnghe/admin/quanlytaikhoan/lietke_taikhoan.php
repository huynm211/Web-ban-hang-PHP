<?php
	//table nguoidung(id_nguoidung, tendangnhap, matkhau, tennguoidung, diachi, email, dienthoai, loaitaikhoan)
	$sql = "select id_nguoidung, tendangnhap, tennguoidung, diachi, email, dienthoai, loaitaikhoan from nguoidung";
	$result = select_query($sql);
?>

<table width="100%" border="1">
	<tr>
    	<td>ID</td>
    	<td>Tên đăng nhập</td>
        <td>Họ tên</td>
        <td>Địa chỉ</td>
        <td>Email</td>
        <td>Điện thoại</td>
        <td>Vai trò</td>
        <td>Quản lý</td>
  	</tr>
  
  	<?php
  		foreach($result as $item){
  	?>
  		<tr>
    		<td><?php  echo $item['id_nguoidung'];?></td>
    		<td><?php echo $item['tendangnhap'] ?></td>
            <td><?php echo $item['tennguoidung'] ?></td>
            <td><?php echo $item['diachi'] ?></td>
            <td><?php echo $item['email'] ?></td>
            <td><?php echo $item['dienthoai'] ?></td>
            
            <!--Hiển thị dữ liệu cho cột "Vai trò"-->
            <?php
           	if($item['loaitaikhoan'] == '1') {
			?>
            	<td>Admin</td> 
           	<?php
            }
            elseif($item['loaitaikhoan'] == '2') {
            ?>
            	<td>Khách hàng</td>
            <?php
            }
            else { //loaitaikhoan = 3
            ?>
            	<td>Đã bị khóa</td>
            <?php
            } 
            ?>  
            <!--Kết thúc hiển thị dữ liệu cho cột "Vai trò"-->
            
            
            <!--Hiển thị dữ liệu cho cột "Quản lý"-->
            <?php
           	if($item['loaitaikhoan'] == '1') {
			?>
            	<td>&nbsp;</td> 
           	<?php
            }
            elseif($item['loaitaikhoan'] == '2') {
            ?>
            	<td>
            		<a href="?quanly=taikhoan&ac=capnhatloaitaikhoan&id_nguoidung=<?php echo $item['id_nguoidung']?>">Khóa</a>
            	</td>
            <?php
            }
            else { //loaitaikhoan = 3
            ?>
            	<td>
            		<a href="?quanly=taikhoan&ac=capnhatloaitaikhoan&id_nguoidung=<?php echo $item['id_nguoidung']?>">Mở khóa</a>
            	</td>
            <?php
            } 
            ?>  
            <!--Kết thúc hiển thị dữ liệu cho cột "Quản lý"-->
            
  		</tr>
    
  		<?php
  		}
  		?>
</table>
