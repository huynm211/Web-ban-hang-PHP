<?php
	//table sanpham: id_sanpham, tensp, giasp, mota, soluong, baohanh, hinhanh, id_loaisp, id_ncc
	$sql = " select * from sanpham where id_sanpham = '$_GET[id_sanpham]' ";
	$sanpham = select_query($sql);
?>

<div class="button_them">
	<a href="index.php?quanly=sanpham&ac=lietke">Xem danh sách</a> 
</div>

<form action="quanlysanpham/quanlysanpham.php?id_sanpham=<?php echo $sanpham[0]['id_sanpham']?>" method="post" enctype="multipart/form-data">
<h3>&nbsp;</h3>
<table width="600" border="1">
  <tr>
    <td colspan="2" style="text-align:center;font-size:25px;">Cập nhật thông tin sản phẩm</td>
  </tr>
  
  <tr>
    <td width="97">Tên sản phẫm</td>
    <td width="87"><input type="text" name="tensp" value="<?php echo $sanpham[0]['tensp']?>"></td>
  </tr>
  
  <tr>
    <td>Giá</td>
    <td><input type="number" name="gia" min="50000" value="<?php echo $sanpham[0]['giasp']?>"> (Đồng)</td>
  </tr>
  
  <tr>
    <td>Mô tả</td>
    <td><textarea name="mota" cols="40" rows="10"> <?php echo $sanpham[0]['mota']?> </textarea></td>
  </tr>
  
  <tr>
    <td>Số lượng</td>
    <td><input type="number" name="soluong" min="1" value="<?php echo $sanpham[0]['soluong']?>"></td>
  </tr>
  
   <tr>
    <td>Bảo hành</td>
    <td><input type="number" name="baohanh" min="1" value="<?php echo $sanpham[0]['baohanh']?>"> (Tháng)</td>
  </tr>
  
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh" />
    	<img src="quanlysanpham/uploads/<?php echo $sanpham[0]['hinhanh'] ?>" width="80" height="80">
     </td>
  </tr>
   
  <tr>
	<?php
  		$sql = "select id_loaisp,tenloaisp from loaisp";
  		$loaisanpham = select_query($sql);
	?>
    <td>Loại sản phẩm</td>
    
    <td>
    	<select name="loaisp">
    		<?php
				foreach($loaisanpham as $item) {
					if($item['id_loaisp'] == $sanpham[0]['id_loaisp']){
			?>
            			<option selected="selected" value="<?php echo $item['id_loaisp'] ?>">
							<?php echo $item['tenloaisp'] ?>
                		</option>
            <?php
					} else {
			?>
    					<option value="<?php echo $item['id_loaisp'] ?>">
							<?php echo $item['tenloaisp'] ?>
                		</option>
        	<?php
					}
				}
			?>
    	</select>
	</td>
  </tr>
  
   <tr>
	<?php
  		$sql = "select id_ncc,tenncc from nhacungcap";
  		$nhacungcap = select_query($sql);
	?>
    <td>Nhà cung cấp</td>
    
    <td>
    	<select name="nhacungcap">
    		<?php
				foreach($nhacungcap as $item) {
					if($item['id_ncc'] == $sanpham[0]['id_ncc']){
			?>
            			<option selected="selected" value="<?php echo $item['id_ncc'] ?>">
							<?php echo $item['tenncc'] ?>
                		</option>
            <?php
					} else {
			?>
    					<option value="<?php echo $item['id_ncc'] ?>">
							<?php echo $item['tenncc'] ?>
                		</option>
        	<?php
					}
				}
			?>
    	</select>
	</td>
  </tr> 
 
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="sua" value="Cập nhật sản phẩm">
    </div></td>
  </tr>
</table>
</form>


