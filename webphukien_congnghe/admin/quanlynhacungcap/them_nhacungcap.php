<div class="button_them">
	<a href="index.php?quanly=nhacungcap&ac=lietke">Xem danh sách</a> 
</div>

<form action="quanlynhacungcap/quanlynhacungcap.php" method="post" enctype="multipart/form-data">
<h3>&nbsp;</h3>
<table width="200" border="1">
  <tr>
    <td colspan="2" style="text-align:center; font-size:25px">Thêm nhà cung cấp</td>
  </tr>
  <tr>
    <td width="33">Nhà cung cấp</td>
    <td width="151"><input type="text" name="tenncc"></td>
  </tr>
	
  <tr>
    <td width="33">Địa chỉ</td>
    <td width="151"><input type="text" name="diachi"></td>
  </tr>
  
   <tr>
    <td width="33">Email</td>
    <td width="151"><input type="email" name="email"></td>
  </tr>
  
  <tr>
    <td width="33">Số điện thoại</td>
    <td width="151"><input type="tel" name="dienthoai" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" required> (Định dạng: 090 212 3456)</td>
  </tr>
  
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="them" value="Thêm">
    </div></td>
  </tr>
</table>
</form>


