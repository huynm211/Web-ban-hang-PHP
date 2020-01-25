
<?php
	if(isset($_GET['trang'])){
		$trang=$_GET['trang'];
	}else{
		$trang='';
	}
	if($trang =='' || $trang =='1'){
		$trang1=0;
	}else{
		$trang1 = ($trang*5)-5;
	}
	
	$sql = "select 
				id_sanpham, tensp, giasp, mota, soluong, baohanh, hinhanh, tenloaisp, tenncc 
			from 
				sanpham sp, nhacungcap ncc, loaisp lsp 
			where 
				ncc.id_ncc = sp.id_ncc and sp.id_loaisp = lsp.id_loaisp 
			order by id_sanpham asc limit $trang1,5 ";
			
	$result = select_query($sql);

?>

<div class = "button_them">
  <a href = "index.php?quanly=sanpham&ac=them">Thêm Mới</a> 
</div>

<table width="100%" border="1">
  	<tr align="center">
    	<td width="4%">ID</td>
    	<td width="13%">Tên sản phẩm</td>
    	<td width="6%">Giá</td>
    	<td width="17%">Mô tả</td>
    	<td width="6%">Số lượng</td>
    	<td width="5%">Bảo hành (tháng)</td>
    	<td width="10%">Hình ảnh</td>
    	<td width="11%">Loại sản phẩm</td>
    	<td width="19%">Nhà cung cấp</td>
    	<td width="9%">&nbsp;</td>
  	</tr>
  
  	<?php
  	foreach($result as $item) {
  	?>
  	<tr>
    	<td><?php echo $item['id_sanpham']; ?></td>
    	<td><?php echo $item['tensp']; ?></td>
        <td><center><?php echo number_format($item['giasp']); ?></center></td>
        <td><?php echo $item['mota']; ?></td>
        <td><center><?php echo $item['soluong']; ?></center></td>
        <td><center><?php echo $item['baohanh']; ?></center></td>
        <td><img src="quanlysanpham/uploads/<?php echo $item['hinhanh']; ?>" width="80" height="80" />
 		<td><?php echo $item['tenloaisp']; ?></td>   
    	<td><?php echo $item['tenncc']; ?></td>
        <td>
        	<a href="index.php?quanly=sanpham&ac=capnhat&id_sanpham=<?php echo $item['id_sanpham']; ?>">Cập nhật</a>
        </td>
	</tr>
  	<?php
  	}
  	?>

</table>

<div class="trang">
Trang :
	<?php
		$sql = "select * from sanpham";
		$result = select_query($sql);
		
		$count_trang = count($result);
	
		$a = ceil($count_trang/5);
		for($b = 1; $b <= $a; $b++) {
			if($trang == $b) {
				echo '<a href="index.php?quanly=sanpham&ac=lietke&trang='.$b.'" 					style="text-decoration:underline;color:red;">'.$b.' ' .'</a>';
        
			}else {
				echo '<a href="index.php?quanly=sanpham&ac=lietke&trang='.$b.'" style="text-decoration:none;color:#000;">'.			$b.' ' .'</a>';
			}
		}
	?>
</div>
