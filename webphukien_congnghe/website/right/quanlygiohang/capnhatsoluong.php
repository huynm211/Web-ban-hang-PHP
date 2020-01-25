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
		})//Bắt sự kiện button giảm số lượng
		
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
	session_start();
	include('../../../config/config.php');
	$manguoidung = $_SESSION['dangnhap'];
	
	$sql_laymagiohang = "select id_giohang from giohang where id_nguoidung = $manguoidung";
	$result_laymagiohang = select_query($sql_laymagiohang);
	
	$magiohang = $result_laymagiohang[0]['id_giohang'];
	$masanpham = $_GET['id_sanpham'];
	
	$sql_capnhat_soluongmua = "";
	$sql_capnhat_tonkho = "";
	
	//Khách hàng click button giảm số lượng
	if(isset($_GET['giamsoluong'])){	
		//lấy số lượng mua trong chi tiết giỏ hàng ứng với mã sản phẩm
		$sql_get_soluongmua = "select soluongmua from chitiet_giohang 	
								where id_sanpham = $masanpham and id_giohang = $magiohang";
		$result_get_soluongmua = select_query($sql_get_soluongmua);
		$soluongmua = $result_get_soluongmua[0]['soluongmua'];
		//Đã lấy xong số lượng mua 
		
		//Nếu số lượng mua = 1 thì thông báo
		if($soluongmua == 1) {
			echo 'Vui lòng không đặt số lượng thấp hơn 1';
		}
		else {
			
			//B1: giảm số lượng mua trong chi tiết giỏ hàng ứng với mã sản phẩm (-1 số lượng mua)	
			$sql_capnhat_soluongmua = "update chitiet_giohang set soluongmua = soluongmua - 1 
										where id_giohang = $magiohang and id_sanpham = $masanpham";
										
			//B2: Cập nhật tồn kho sản phẩm (+1 số lượng tồn kho)
			$sql_capnhat_tonkho = "update sanpham set soluong = soluong + 1 where id_sanpham = $masanpham";
		}
		
	}
	
	//Khách hàng click button tăng số lượng
	else {
		//Lấy số lượng tồn kho ứng với mã sản phẩm
		$sql_get_soluongtonkho = "select soluong from sanpham where id_sanpham = $masanpham";
		$result_get_soluongtonkho = select_query($sql_get_soluongtonkho);
		$soluong_tonkho = $result_get_soluongtonkho[0]['soluong'];
		
		//Kiểm tra tránh trường hợp khách hàng click đặt hàng vượt tồn kho (tồn kho chỉ còn 0 sản phẩm)
		if($soluong_tonkho == 0) {
			echo "Trong kho không còn sản phẩm này !";
		}
		else {
			//B1: tang số lượng mua trong chi tiết giỏ hàng ứng với mã sản phẩm (+1 số lượng mua)	
			$sql_capnhat_soluongmua = "update chitiet_giohang set soluongmua = soluongmua + 1 
										where id_giohang = $magiohang and id_sanpham = $masanpham";
										
			//B2: Cập nhật tồn kho sản phẩm (-1 số lượng tồn kho)
			$sql_capnhat_tonkho = "update sanpham set soluong = soluong - 1 where id_sanpham = $masanpham";
		}
		
	}
	$sql_capnhatthanhtien = "update chitiet_giohang 
								set thanhtien = soluongmua*dongia 
								where id_giohang = $magiohang and id_sanpham = $masanpham";
		
	if($sql_capnhat_soluongmua !== '' && $sql_capnhat_tonkho !== '') {
		insert_or_update($sql_capnhat_soluongmua);
		insert_or_update($sql_capnhat_tonkho);
		insert_or_update($sql_capnhatthanhtien);
	}
?>
<?php
	/*
	table sanpham(id_sanpham, tensp, ...)
	table giohang(id_giohang, id_nguoidung)
	table chitiet_giohang(id_giohang, id_sanpham, dongia, soluongmua, thanhtien)
	*/
	$manguoidung = $_SESSION['dangnhap'];
	$sql = "select sp.hinhanh, sp.id_sanpham, sp.tensp, ctgh.soluongmua, ctgh.dongia, ctgh.thanhtien 
			from sanpham sp, giohang gh, chitiet_giohang ctgh 
			where sp.id_sanpham = ctgh.id_sanpham and ctgh.id_giohang = gh.id_giohang and gh.id_nguoidung = $manguoidung";
	$result = select_query($sql);
	
	if (count($result) > 0) {
?>
	
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
