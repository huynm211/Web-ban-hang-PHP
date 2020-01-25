<script>
	$(document).ready(function() {
        //Bắt sự kiện click button nhập hàng
		$('input#nhaphang:button').click(function() {
			var id_ncc = $('#danhsach_ncc').find('option:selected').attr('value');
			//alert(id_ncc);//OK
			
			//Hàm ajax load danh sách sản phẩm ứng với nhà cung cấp
			$.ajax({
					url:"quanlyhoadonnhap/themhoadonnhap/chon_sanpham.php",
					method:"post",
					data:{ma_nhacungcap:id_ncc},
					dataType:"text",
					success: function(data)
					{
						
						$('#themsanpham').html(data);
					},
					error: function(data)
					{
						console.log(data);
					}
				})//Kết thúc ajax
		});//Kết thúc sự kiện click button nhập hàng
    });
	
</script>

<!--Đổ dữ liệu danh sách nhà cung cấp vào combobox-->
<?php
	$sql = "select id_ncc, tenncc from nhacungcap";
	$result = select_query($sql);
?>
<div id="nhacungcap">
	<br>
    <a href="?quanly=hoadonnhap&ac=lietke">Quay lại</a>
    <br>
    <p style="text-align:center;color:blue;">THÊM HÓA ĐƠN NHẬP HÀNG</p>
    <p style="text-align:center">------------------------------------------------------------------------------</p>

    <p style="text-align:center;color:blue;">1. CHỌN NHÀ CUNG CẤP</p>
    <br>
	<div class="chonnhacungcap" style="text-align:center">
    	Chọn nhà cung cấp: 
        <select id="danhsach_ncc" required>
            <?php 
				//load dữ liệu vào combobox
				foreach($result as $item) {	
			?>
            <option value="<?php echo $item['id_ncc']?>">
				<?php echo $item['id_ncc']?> - <?php echo $item["tenncc"]?>
            </option>
            	<?php 
				} //Kết thúc load
				?>
        </select>
        <br><br>
        <input type="button" id="nhaphang" value="Nhập hàng" style="width:100px;height:30px;"/>
    </div> 
<!--Kết thúc đổ dữ liệu danh sách nhà cung cấp vào combobox-->
</div>

<div id="themsanpham"></div>
