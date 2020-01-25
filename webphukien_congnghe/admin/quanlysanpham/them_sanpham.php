<div class="button_them">
	<a href="index.php?quanly=sanpham&ac=lietke">Xem danh sách</a> 
</div>

<form action="quanlysanpham/quanlysanpham.php" method="post" enctype="multipart/form-data">
<h3>&nbsp;</h3>
<table width="600" border="1">
  <tr>
    <td colspan="2" style="text-align:center;font-size:25px;">Thêm  sản phẩm</td>
  </tr>
  
  <tr>
    <td width="97">Tên sản phẫm</td>
    <td width="87"><input type="text" name="tensp"></td>
  </tr>
  
  <tr>
    <td>Giá</td>
    <td><input type="number" name="gia" min="50000"> (Đồng)</td>
  </tr>
  
  <tr>
    <td>Mô tả</td>
    <td><textarea name="mota" cols="40" rows="10"></textarea></td>
  </tr>
  
  <tr>
    <td>Số lượng</td>
    <td><input type="number" name="soluong" min="1"></td>
  </tr>
  
   <tr>
    <td>Bảo hành</td>
    <td><input type="number" name="baohanh" min="1"> (Tháng)</td>
  </tr>
  
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh" /></td>
  </tr>
   
  <tr>
	<?php
  		$sql = "select id_loaisp,tenloaisp from loaisp";
  		$result = select_query($sql);
	?>
    <td>Loại sản phẩm</td>
    
    <td>
    	<select name="loaisp">
    		<?php
				foreach($result as $item) {
			?>
    			<option value="<?php echo $item['id_loaisp'] ?>">
					<?php echo $item['tenloaisp'] ?>
                </option>
        		<?php
				}
				?>
    	</select>
	</td>
  </tr>
  
   <tr>
	<?php
  		$sql = "select id_ncc,tenncc from nhacungcap";
  		$result = select_query($sql);
	?>
    <td>Nhà cung cấp</td>
    
    <td>
    	<select name="nhacungcap">
    		<?php
				foreach($result as $item) {
			?>
    			<option value="<?php echo $item['id_ncc'] ?>">
					<?php echo $item['tenncc'] ?>
                </option>
        		<?php
				}
				?>
    	</select>
	</td>
  </tr>
 
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="them" value="Thêm sản phẩm">
    </div></td>
  </tr>
</table>
</form>


