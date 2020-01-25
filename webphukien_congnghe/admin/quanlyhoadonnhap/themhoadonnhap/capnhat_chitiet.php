<?php
	//Thêm sản phẩm vào chi tiết hóa đơn
	if(isset($_POST['mahoadon']) && isset($_POST['masanpham']) && 
		isset($_POST['giasanpham']) && isset($_POST['soluongnhap'])) {
			
		require('../../../config/config.php');
		$id_hoadonnhap = $_POST['mahoadon'];
		$id_sanpham = $_POST['masanpham'];
		$dongia = $_POST['giasanpham'];
		$soluongnhap = $_POST['soluongnhap'];
		
		//Kiểm tra mã sản phẩm mới thêm có tồn tại trong chi tiết đơn hàng hay chưa
		$sql_kiemtratontai = "select id_sanpham from chitietnhap 
							where id_hoadonnhap = $id_hoadonnhap and id_sanpham = $id_sanpham";
		$result_kiemtratontai = select_query($sql_kiemtratontai);
		
		//Nếu đã có mã sản phẩm rồi thì cập nhật lại số lượng
		if(count($result_kiemtratontai) > 0) {
			$sql_capnhatsoluong = "update chitietnhap set soluong = soluong + $soluongnhap";
			if(!insert_or_update($sql_capnhatsoluong)) {
				echo 'Có lỗi khi cập nhật số lượng trong chi tiết nhập';
			}
		}
		
		//Nếu chưa có thì insert dòng mới
		else {
			$sql_themchitiet = "insert into chitietnhap(id_hoadonnhap, id_sanpham, soluong, dongia) 
											values($id_hoadonnhap, $id_sanpham, $soluongnhap, $dongia)";
											
			if(!insert_or_update($sql_themchitiet) && !insert_or_update($sql_capnhattinhtrang)) {
				echo 'Có lỗi khi cập nhật số lượng trong chi tiết nhập';
			}								
		}		
		
		//Cập nhật lại tổng tiền
		$sql_tinh_tongtien = "select sum(dongia*soluong) as tongtien from chitietnhap where id_hoadonnhap = $id_hoadonnhap";
		$result_tinh_tongtien = select_query($sql_tinh_tongtien);
		if(count($result_tinh_tongtien) > 0){
			$tongtien = $result_tinh_tongtien[0]['tongtien'];
		}
	
		$sql_capnhat_hoadon = "update hoadonnhap set tongtiennhap = $tongtien where id_hoadonnhap = $id_hoadonnhap";
		if(!insert_or_update($sql_capnhat_hoadon)) {
			echo "<script>alert('Có lỗi khi cập nhật chi tiết đơn hàng')</script>";
		}
	}//Kết thúc thêm sản phẩm vào chi tiết hóa đơn
	
	//Xóa 1 dòng trong chi tiết hóa đơn (ajax button xóa)
	elseif(isset($_POST['mahoadon']) && isset($_POST['masanpham'])){
		require('../../../config/config.php');
		$mahoadon = $_POST['mahoadon'];
		$masanpham = $_POST['masanpham'];
		$sql = "delete from chitietnhap where id_hoadonnhap = $mahoadon and id_sanpham = $masanpham";
		if(!insert_or_update($sql)) {
			echo '<p>Có lỗi xảy ra khi xóa 1 dòng trong chi tiết nhập</p>';
		}
	}
	
?>

<!--load chi tiết hóa đơn-->
<?php
	/*
	table sanpham(id_sanpham, tensp, hinhanh ...)
	table chitietnhap(id_hoadonnhap, id_sanpham, soluong, dongia)
	*/
	$mahoadon = $_POST['mahoadon'];
	$sql = 
			"select sp.hinhanh, sp.tensp, sp.id_sanpham, ct.soluong, ct.dongia, ct.soluong * ct.dongia as thanhtien 
			from sanpham sp, chitietnhap ct 
			where sp.id_sanpham = ct.id_sanpham and ct.id_hoadonnhap = $mahoadon
			";
	$result = select_query($sql);
	
	if (count($result) > 0) {

?>
	<div id="chitiethoadon">
    <br>
    <p style="text-align:center">------------------------------------------------------------------------------</p>

    <p style="text-align:center;color:blue;">3. CHI TIẾT HÓA ĐƠN NHẬP</p>
    <br>
    <table width="100%" border="1">
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
            <td style="text-align:center">
            <img src="../admin/quanlysanpham/uploads/<?php echo $item['hinhanh']?>" width="100" height="100" />
            </td>
             
            <td><?php echo $item['tensp']?></td>    
            <td><?php echo $item['soluong']?></td>  
            <td><?php echo number_format($item['dongia']) ?></td>
            <td><?php echo number_format($item['thanhtien']) ?></td>
            
            <td style="text-align:center">
                <input type="button" class="xoasanpham" id="<?php echo $mahoadon?>-<?php echo $item['id_sanpham']?>" 
                value="X"/>
            </td>
   
        </tr>        
    <?php
        } //Kết thúc vòng lặp tạo bảng
    ?>
        <tr>
            <td colspan="4">Tổng tiền</td>
            <td colspan="2"><?php echo number_format($tongtien)?> VND</td>
        </tr>
   </table>            
</div><!--Kết thúc chi tiết đơn hàng nhập-->
	 
<?php	
	}
?>

<div id="capnhatchitiet"></div>

<script type="text/javascript">
$(document).ready(function() {	
	//Bắt sự kiện button xóa
	$('input.xoasanpham:button').on('click',function(){
		var string = $(this).attr('id');
		var arr = string.split("-");
		var id_hoadon = arr[0];
		var id_sanpham = arr[1];
		$.ajax({
			url:'quanlyhoadonnhap/themhoadonnhap/capnhat_chitiet.php',
			method:'post',
			data:{
				mahoadon : id_hoadon,
				masanpham: id_sanpham
			},	
			dataType:'text',
			success: function(data)
			{
				$('#chitiethoadon').html('');
				$('#capnhatchitiet').html(data);
			},
			error: function(data)
			{
				console.log(data);
			}
		})//Kết thúc hàm ajax
	})//Kết thúc sự kiện button xóa
				
})

</script>