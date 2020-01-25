<?php
	if(isset($_POST['logout'])){
		unset($_SESSION['dangnhap']);
		header('location:login.php');
	}
?>

<form action="" method="post" enctype="multipart/form-data">
	<input type="submit" name="logout" value="Đăng xuất" style="background:#06F;color:#fff;width:200px;height:30px;" />
</form>
<br/>
<div class="menu">
    	<ul>
        	<li><a href="index.php?quanly=taikhoan&ac=lietke">Tài khoản</a></li>
            
        	<li><a href="index.php?quanly=sanpham&ac=lietke">Sản phẩm</a></li>
        	
            <li><a href="index.php?quanly=loaisp&ac=lietke">Loại sản phẩm</a></li>
            
            <li><a href="index.php?quanly=nhacungcap&ac=lietke">Nhà cung cấp</a></li>
            
            <li><a href="index.php?quanly=hoadonnhap&ac=lietke">Hóa đơn nhập</a></li>
            
            <li><a href="index.php?quanly=hoadonban&ac=lietke">Hóa đơn bán</a></li>   
        </ul>   
</div>

<!--<form action="index.php?quanly=timkiem&ac=sp" method="post" enctype="multipart/form-data">
     <p><input type="text" name="masp" placeholder="Nhập mã sản phẩm..." id="timkiem" required="required" />
        <input type="submit" id="button_timkiem" name="timkiem" value="Tìm sản phẩm" />
        </p>
        </form>-->