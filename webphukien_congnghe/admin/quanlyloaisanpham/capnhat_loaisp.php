<?php
	$sql = "select * from loaisp where id_loaisp = '$_GET[id_loaisp]'";
	$result = select_query($sql);

	/*
		$result = array(
			0 => array (
				"id_loaisp" => kết quả truy vấn,
				"tenloaisp" => kêt quả truy vấn
				),
		)
	*/
?>
<div class="button_them">
<a href="index.php?quanly=loaisp&ac=lietke">Xem danh sách</a> 
</div>

<form action="quanlyloaisanpham/quanlyloaisp.php?id_loaisp=<?php echo $result[0]['id_loaisp']?>" method="post" enctype="multipart/form-data">
<h3>&nbsp;</h3>
<table width="200" border="1">
  <tr>
    <td colspan="2" style="text-align:center; font-size:25px">Sửa loại sản phẩm</td>
  </tr>
  
  <tr>
    <td width="97">ID</td>
    <td width="87"><input type="text" name="id_loaisp" value="<?php echo $result[0]['id_loaisp'] ?> " readonly></td>
  </tr>
  
  <tr>
    <td width="97">Tên loại sp</td>
    <td width="87"><input type="text" name="loaisp" value="<?php echo $result[0]['tenloaisp'] ?>"></td>
  </tr>
 
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="sua" value="Sửa">
    </div></td>
  </tr>
</table>
</form>


