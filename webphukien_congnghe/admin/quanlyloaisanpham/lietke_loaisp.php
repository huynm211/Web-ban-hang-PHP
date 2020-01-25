<?php
	$sql = "select * from loaisp";
	$result = select_query($sql);
?>

<div class="button_them">
	<a href="index.php?quanly=loaisp&ac=them">Thêm Mới</a> 
</div>

<table width="100%" border="1">
	<tr>
    	<td>ID</td>
    	<td>Tên loại sản phẩm</td>
    	<td>&nbsp;</td>
  	</tr>
  
  	<?php
  		foreach($result as $item){
  	?>
  		<tr>
    		<td><?php  echo $item['id_loaisp'];?></td>
    		<td><?php echo $item['tenloaisp'] ?></td>
            <td>
            	<a href="index.php?quanly=loaisp&ac=capnhat&id_loaisp=<?php echo $item['id_loaisp'] ?>">Cập nhật</a>
            </td>
  		</tr>
    
  		<?php
  		}
  		?>
</table>
