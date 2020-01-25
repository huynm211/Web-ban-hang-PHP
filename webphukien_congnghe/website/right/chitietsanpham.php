<!--code php xử lý load dữ liệu khi khách hàng bấm xem sản phẩm-->
<?php
	//table sanpham: id_sanpham, tensp, giasp, mota, soluong, baohanh, hinhanh, id_loaisp, id_ncc
	$sql = "select * from sanpham where id_sanpham = '$_GET[id_sanpham]'";
	$result = select_query($sql);
	
	global $masp;
	$masp = $result[0]['id_sanpham'];
	
	global $maloaisp;
	$maloaisp = $result[0]['id_loaisp'];
?>
<!--Kết thúc xử lý load dữ liệu-->

<!--code php xử lý khi khách hàng chọn "Mua hàng"(submit)-->
<?php 
	if(isset($_POST['add_to_cart'])) {
		if(!isset($_SESSION['dangnhap'])) {
			echo '<p>Vui lòng 
						<a href="index.php?quanly=dangnhap" style="color:red">đăng nhập
						</a> để thực hiện thao tác này
				  </p></br>';
		}
		elseif($_POST['soluongmua'] > $result[0]['soluong']) {
			echo 'Vui lòng không đặt quá số lượng tồn kho';
		}
		else {
			$_SESSION['id_nguoidung'] = $_SESSION['dangnhap'];
			$_SESSION['id_sanpham'] = $result[0]['id_sanpham'];
			$_SESSION['giasp'] = $result[0]['giasp'];
			$_SESSION['soluongmua'] = $_POST['soluongmua'];
			echo "<script type='text/javascript'>
					window.top.location='index.php?quanly=quanlygiohang&ac=themsanpham';
				</script>"; 
			exit;
		}
		
	}
?>
<!--Kết thúc xử lý submit-->

<div class="tieude">Chi tiết sản phẩm</div>   
	<div class="box_chitietsp">
		<div class="box_hinhanh">
        	</br>&emsp;
        	<img src="../admin/quanlysanpham/uploads/<?php echo $result[0]['hinhanh'] ?>" width="200" height="250" />
        </div>
        
	<div class="box_info">
		<form action = "" method = "post" enctype = "multipart/form-data">
			<p>
            	<strong>Tên sản phẫm: </strong><em style="color:red"><?php echo $result[0]['tensp'] ?></em>
            </p>

			<p>
            	<strong>Giá bán:</strong>
                <span style="color:red;"> <?php echo number_format($result[0]['giasp']).' '.'VNĐ'?></span>
            </p> 
            
			<p><strong>Số lượng tồn:</strong>  <?php echo $result[0]['soluong'] ?> </p> 
            
            <p><strong>Bảo hành:</strong>  <?php echo $result[0]['baohanh'] ?> tháng</p> 
            
            <p><strong>Số lượng mua:</strong><input type="number" name="soluongmua" size="3" value="1" min="1" max="50"/></p>
            
           	<input type = "submit" name="add_to_cart" value="Mua hàng" 
            	style="margin:10px;width:100px;height:40px;background:#9F6;color:#000;font-size:18px;border-radius:8px;" 
            />
                 
		</form>              
           
 	 </div><!-- Ket thuc box box_info -->
</div><!-- Ket thuc box chitiet sp -->
     			
<!--Thông tin chi tiết sản phẩm, thông số, đánh giá-->
<div class="tabs_panel">
    <ul class="tabs">
        <li rel="panel1" class="active">Thông tin sản phẩm</li>
        <li rel="panel2">Khách hàng đánh giá</li>
    </ul>
    
<?php
	if($result[0]['mota'] !== ''){
?>
    <div id="panel1" class="panel active">
        <p><?php echo $result[0]['mota'] ?></p>
    </div>
<?php
	}else{
    	echo '<p style="padding:30px;">Hiện chưa có thông tin chính thức	</p>';
	}
?>
    
    <div id="panel2" class="panel">
    	<p>Chưa có đánh giá nào...</p>
  
  	</div>
</div>
<!--Kết thúc Thông tin chi tiết sản phẩm, thông số, đánh giá-->


<!--Gợi ý sản phẩm liên quan-->
<?php
	//table sanpham: id_sanpham, tensp, giasp, mota, soluong, baohanh, hinhanh, id_loaisp, id_ncc
	$sql= "select * from sanpham where id_loaisp = $maloaisp and sanpham.id_sanpham <> $masp";
	$result = select_query($sql);
	if(count($result) > 0) {
?>
	<div class="sanphamlienquan">
	<div class="tieude">Sản phẩm liên quan</div>
    	<ul class="product">
   		<?php
			foreach($result as $item) {
    	?>
				<li>
                	<a href="?quanly=chitietsanpham&id_sanpham=<?php echo $item['id_sanpham']?>">
					<img src="../admin/quanlysanpham/uploads/<?php echo $item['hinhanh'] ?>" width="150" height="150" />
					<div style="height:40px;">
                    <p id="tensp"><?php echo $item['tensp'] ?></p>
                    </div>
        			<p id="giasp"><?php echo number_format($item['giasp']) ?> VND</p>
					</a>
                </li>
   		<?php
    		}
		?>
    	</ul>
	</div><!-- Ket thuc box sp liên quan -->
<?php
	}else{
    	echo'<div class="tieude">Sản phẩm liên quan</div>';
    	echo '<p style="padding:30px;">Hiện chưa có thêm sản phẩm nào</p>';
	}
?>
<div class="clear"></div>
          
     
           