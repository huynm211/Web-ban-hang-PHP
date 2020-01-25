<?php
	$sql = "select * from nhacungcap";
	$result = select_query($sql);
?>

<div class="button_them">
	<a href="index.php?quanly=nhacungcap&ac=them">Thêm Mới</a> 
</div>

<table width="100%" border="1">
	<tr>
    	<td width="7%">ID</td>
    	<td width="18%">Nhà cung cấp</td>
        <td width="27%">Địa chỉ</td>
        <td width="18%">Email</td>
        <td width="17%">Điện thoại</td>
    	<td width="13%">&nbsp;</td>
  	</tr>
  
  	<?php
  		foreach($result as $item){
  	?>
  		<tr>
    		<td><?php  echo $item['id_ncc'];?></td>
    		<td><?php echo $item['tenncc'] ?></td>
            <td><?php echo $item['diachi'] ?></td>
            <td><?php echo $item['email'] ?></td>
            <td><?php echo $item['sdt_ncc'] ?></td>
            <td>
            	<a href="index.php?quanly=nhacungcap&ac=capnhat&id_ncc=<?php echo $item['id_ncc'] ?>">Cập nhật</a>
            </td>
  		</tr>
    
  		<?php
  		}
  		?>
</table>
