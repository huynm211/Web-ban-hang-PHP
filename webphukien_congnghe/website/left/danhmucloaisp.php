<?php
	$sql = "select id_loaisp, tenloaisp from loaisp order by id_loaisp asc";
	$result = select_query($sql);
?>

<div class = "box_list">
	<div class = "tieude">
    	<h3>Loại sản phẩm</h3>
    </div>
    
    <ul class = "list">
    	<?php
			foreach($result as $item) {	
		?>
				<li>
                	<a href="?quanly=danhsachsanpham&id_loaisp=<?php echo $item['id_loaisp']?>">
                        <?php echo $item['tenloaisp'] ?>
                	</a>
                </li>
        <?php
			}
		?>    
    </ul>
</div>


 

                 
                 
                