<?php
	$sql = "select * from nhacungcap where id_ncc = '$_GET[id_ncc]'";
	$result = select_query($sql);
?>
<div class="button_them">
<a href="index.php?quanly=nhacungcap&ac=lietke">Xem danh sách</a> 
</div>

<form action="quanlynhacungcap/quanlynhacungcap.php?id_ncc=<?php echo $result[0]['id_ncc']?>" method="post" enctype="multipart/form-data">
<h3>&nbsp;</h3>
<table width="200" border="1">
  <tr>
    <td colspan="2" style="text-align:center; font-size:25px">Cập nhật thông tin nhà cung cấp</td>
  </tr>
  
  <?php
  	foreach($result as $item) {
  ?>
  <tr>
    <td width="33">ID</td>
    <td width="151"><input type="text" name="id_ncc" value="<?php echo $item['id_ncc'] ?> " readonly></td>
  </tr>
  
  <tr>
    <td width="33">Nhà cung cấp</td>
    <td width="151"><input type="text" name="tenncc" value="<?php echo $item['tenncc'] ?>"></td>
  </tr>
  
  <tr>
    <td width="33">Địa chỉ</td>
    <td width="151"><input type="text" name="diachi" value="<?php echo $item['diachi'] ?>"></td>
  </tr>
  
  <tr>
    <td width="33">Email</td>
    <td width="151"><input type="email" name="email" value="<?php echo $item['email'] ?>"></td>
  </tr>
  
  <tr>
    <td width="33">Điện thoại</td>
    <td width="151"><input type="tel" name="dienthoai" value="<?php echo $item['sdt_ncc'] ?>"> (Định dạng: 090 212 3456)</td>
  </tr>
  
  <?php 
	}
  ?>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="sua" value="Sửa">
    </div></td>
  </tr>
</table>
</form>


