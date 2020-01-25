<script>
	$(document).ready(function() {
        /*$('#giohang').on("click", "input[type=button] .a", function() {
				var masanpham = $(this).attr('id');
				alert(masanpham);
		}*/
		
		//Bắt sự kiện button giảm số lượng
		$('input.btn_giamsoluong:button').on('click',function(){
			var masanpham = $(this).attr('id');
			/*alert(masanpham);*/
			$.ajax({
				url:'right/quanlygiohang/capnhatsoluong.php',
				method:'get',
				data:
					{id_sanpham: masanpham,
					giamsoluong: 1},
				dataType:'text',
				success: function(data)
				{
					$('#giohang').html('');
					$('#ajax_area').html(data);
				},
				error: function(data)
				{
					console.log(data);
				}
			})//Kết thúc hàm ajax
		})//Kết thúc sự kiện button giảm số lượng
		
		//Bắt sự kiện button tăng số lượng
		$('input.btn_tangsoluong:button').on('click',function(){
			var masanpham = $(this).attr('id');
			/*alert(masanpham);*/
			$.ajax({
				url:'right/quanlygiohang/capnhatsoluong.php',
				method:'get',
				data:
					{id_sanpham: masanpham,
					tangsoluong: 1},
				dataType:'text',
				success: function(data)
				{
					$('#giohang').html('');
					$('#ajax_area').html(data);
				},
				error: function(data)
				{
					console.log(data);
				}
			})//Kết thúc hàm ajax
		})//Kết thúc sự kiện button tăng số lượng
		
		
	})

</script>

<?php
	/*
	table sanpham(id_sanpham, tensp, ...)
	table giohang(id_giohang, id_nguoidung)
	table chitiet_giohang(id_giohang, id_sanpham, dongia, soluongmua, thanhtien)
	*/
	$manguoidung = $_SESSION['dangnhap'];
	$sql = "select sp.hinhanh, sp.id_sanpham, sp.tensp, gh.id_giohang, ctgh.soluongmua, ctgh.dongia, ctgh.thanhtien 
			from sanpham sp, giohang gh, chitiet_giohang ctgh 
			where sp.id_sanpham = ctgh.id_sanpham and ctgh.id_giohang = gh.id_giohang 
			and gh.id_nguoidung = $manguoidung";
	$result = select_query($sql);
	
	if (count($result) > 0) {
		$_SESSION['id_giohang'] = $result[0]['id_giohang'];
?>
	<div class="tieude">Giỏ hàng của bạn</div>
	<div id="ajax_area"></div><!--Kết thúc div id = ajax_area -->
    
        <div id="giohang" class="box_giohang" >
            <table width="100%" border="1" style="border-collapse:collapse; margin:5px; text-align:center;">
            <tr>
                <td>Sản phẩm</td>
                <td>Tên Sản phẩm</td>
                <td>Số lượng mua</td>
                <td>Đơn giá</td>
                <td>Thành tiền</td>
                <td>&nbsp;</td>
            </tr>
            
            <?php
				$tongtien = 0;
				
				//Tạo bảng
            	foreach($result as $item) {				
					$tongtien += $item['thanhtien'];
			?>
         
                <tr>                
                    <td>
                    <img src="../admin/quanlysanpham/uploads/<?php echo $item['hinhanh']; ?>" width="100" height="100" />
                    </td>
                    
                    <td>
                    	<a href="?quanly=chitietsanpham&id_sanpham=<?php echo $item['id_sanpham']?>">
                        	<?php echo $item['tensp']?>
                        </a>
                    </td>
                    
                    <td>
                        <input type="button" class="btn_giamsoluong" id="<?php echo $item['id_sanpham']?>" value="-" style="width:20px;height:20px;"/>
                        	<?php echo $item['soluongmua']?>
                        <input type="button" class="btn_tangsoluong" id="<?php echo $item['id_sanpham']?>" value="+" style="width:20px;height:20px;"/>
                    </td>
                    
                    <td><?php echo number_format($item['dongia']) ?></td>
                    <td><?php echo number_format($item['thanhtien']) ?></td>
                    <td><a href="index.php?quanly=quanlygiohang&ac=xoa&id_sanpham=<?php echo $item['id_sanpham']?>">Xóa</a></td>
                </tr>        
			<?php
				} //Kết thúc vòng lặp tạo bảng
			?>
            	<tr>
                	<td colspan="4">Tổng tiền</td>
                    <td><?php echo number_format($tongtien)?> VND</td>
                    <td><a href="?quanly=quanlygiohang&ac=xoa">Hủy giỏ hàng</a></td>
                </tr>
           </table>
           
           </br>
           <center><a href="index.php?quanly=quanlydonhang&ac=themdonhang&themdonhang=1">Thanh toán</a></center>
           </br>
		</div><!--Kết thúc box_giohang-->
	 
<?php	
	}
	else {
		echo 'Giỏ hàng của bạn hiện chưa có sản phẩm nào...';
	}
?>

