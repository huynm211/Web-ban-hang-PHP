<?php
	//table sanpham: id_sanpham, tensp, giasp, mota, soluong, baohanh, hinhanh, id_loaisp, id_ncc
	$sql_sanpham = "select id_sanpham, tensp, giasp, hinhanh from sanpham where sanpham.id_loaisp = '$_GET[id_loaisp]'";
	$sanpham = select_query($sql_sanpham);
	$count_sanpham = count($sanpham);
	
	$sql_loaisp = "select tenloaisp from loaisp where id_loaisp = '$_GET[id_loaisp]' ";
	$loaisp = select_query($sql_loaisp);
?>

<div class="tieude"><?php echo $loaisp[0]['tenloaisp'] ?></div>

</br>
<center>
	<input type="text" name="timkiemsp" id="timkiemsp" placeholder="Nhập tên sản phẩm cần tìm" style="width:200px;height:20px;">
</center>	

<ul class="product">

<?php
	if($count_sanpham > 0) {
		$i = 0;
		foreach($sanpham as $item) {
	
?>
			<li>
            	<a href="?quanly=chitietsanpham&id_sanpham=<?php echo $item['id_sanpham']?>">
        		<img src="../admin/quanlysanpham/uploads/<?php echo $item['hinhanh'] ?>" width="150" height="150" />
       			
                <div style="height:40px;">
                <p id="tensp"><?php echo $item['tensp'] ?></p>
               	</div>
               
              
        		<p id="giasp"><?php echo number_format($item['giasp']) ?> VNĐ</p>
 				
                </a>
    		</li>     
<?php 
		}
	} else{
		echo 'Hiện chưa có sản phẩm ...';
	}
?>
</ul>
<div id="ketquatimkiem"></div>

<script>
	$(document).ready(function() {
        $('#timkiemsp').keyup(function() {
			var txt = $(this).val();
			if(txt != '')
			{
				$('.product').hide();
				$.ajax({
					url:"right/timkiemsanpham.php",
					method:"post",
					data:{tensp:txt},
					dataType:"text",
					success: function(data)
					{
						$('#ketquatimkiem').html(data);
					},
					error: function(data)
					{
						console.log(data);
					}
				})

			}
			else 
			{
				$('#ketquatimkiem').html('');
				$('.product').show();
			}
		})
    });
	
</script>