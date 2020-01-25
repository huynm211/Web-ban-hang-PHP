<script>
function themchitiet_donhangnhap() {
	var id_hoadonnhap = $('input#mahoadonnhap:text').val();
	var id_sanpham = $('#danhsach_sanpham').find('option:selected').attr('id');
	var gia_sanpham = $('#danhsach_sanpham').find('option:selected').attr('value');
	var soluong = $('input#soluongnhap').val();
	//alert(soluong);//OK
	
	//Hàm ajax load danh sách sản phẩm ứng với nhà cung cấp
	$.ajax({
			url:"quanlyhoadonnhap/themhoadonnhap/capnhat_chitiet.php",
			method:"post",
			data:{
				mahoadon: id_hoadonnhap,
				masanpham: id_sanpham,
				giasanpham: gia_sanpham,
				soluongnhap: soluong
			},
			dataType:"text",
			success: function(data)
			{
				
				$('#chitiet_hoadonnhap').html(data);
			},
			error: function(data)
			{
				console.log(data);
			}
		})//Kết thúc ajax
}
</script>

<?php 
	//Khách hàng click button Nhập hàng tại phần chọn nhà cung cấp => thêm đơn hàng nhập mới ứng với mã nhà cung cấp
	if(isset($_POST['ma_nhacungcap'])) {
		require('../../../config/config.php');
		
		$id_ncc = $_POST['ma_nhacungcap'];
		
		$mahoadonnhap = '';
		
		//Kiểm tra xem có đơn hàng nào đã được tạo ra trong cùng ngày với nhà cung cấp dc chọn không
		$sql_kiemtradonhang = "select id_hoadonnhap from hoadonnhap 				
							where id_ncc = $id_ncc and tinhtrang = 'Đã xác nhận' and ngaynhap = CURDATE()";
		$result_kiemtradonhang = select_query($sql_kiemtradonhang);
		
		//Nếu đơn hàng đã được tạo trong cùng ngày mà chưa thanh toán thì lấy mã đó để xử lý tiếp
		if(count($result_kiemtradonhang) > 0) {
			$mahoadonnhap = $result_kiemtradonhang[0]['id_hoadonnhap'];
		}	
		
		//Nếu không thì thêm đơn hàng mới
		else {
			//Thêm mới hóa đơn nhập
			$sql_themhoadon = "insert into hoadonnhap(id_ncc, ngaynhap, tinhtrang) 
								values($id_ncc, CURDATE(), 'Đã xác nhận')";
			
			if(!insert_or_update($sql_themhoadon)) {
				echo 'Có lỗi xảy ra khi thêm đơn hàng';
			}
			
			//Lấy mã hóa đơn
			$sql_get_mahoadon = "select id_hoadonnhap from hoadonnhap 
							where id_ncc = $id_ncc and tinhtrang = 'Đã xác nhận' and ngaynhap = CURDATE()";
			$result_get_mahoadon = select_query($sql_get_mahoadon);
			if(count($result_get_mahoadon) > 0) {
				$mahoadonnhap = $result_get_mahoadon[0]['id_hoadonnhap'];
			}
		}
		
		
		
		//Hiển thị nội dung cho người dùng thêm sản phẩm vào chi tiết hóa đơn
		$sql = "select id_sanpham, tensp, giasp from sanpham where id_ncc = $id_ncc";
		$result = select_query($sql);
		
		if(count($result) > 0) {
			
?>
		<br>
        <p style="text-align:center">------------------------------------------------------------------------------</p>
  
        <p style="text-align:center;color:blue;">2. CHỌN SẢN PHẨM</p>
        
        <br>
        <div class="chonsanpham" style="text-align:center">
        	Mã hóa đơn nhập:
            <input type="text" id="mahoadonnhap" value="<?php echo $mahoadonnhap?>" style="width:50px;" readonly/>
            <br><br>
            Chọn sản phẩm nhập: 
            <select id="danhsach_sanpham"  style="width:400px" required >
				<?php 
                //load dữ liệu vào combobox
                foreach($result as $item) {	
                ?>
                	<option id="<?php echo $item['id_sanpham']?>" value="<?php echo $item['giasp']?>">
                		<?php echo $item['id_sanpham']?> - <?php echo $item['tensp']?> - 
						<?php echo number_format( $item['giasp'])?> VND
                	</option>
                <?php 
                } //Kết thúc load
                ?>
            </select>
            <br><br>
            
            Số lượng nhập:
            <input type="number" id="soluongnhap" min="1" value="1" style="width:80px"/>
            <br><br>
            <input type="button" id="themsanpham" value="Thêm" style="width:100px;height:30px;" onClick="themchitiet_donhangnhap()"/>
        </div> 

<?php			
		}//Kết thúc if(count($result) > 0)
		else {
			echo '<br><br><p>Chưa có sản phẩm nào thuộc nhà cung cấp này !</p>';
		}
	}//Kết thúc if(isset($_POST['ma_nhacungcap']))	
?>

<div id="chitiet_hoadonnhap"></div>