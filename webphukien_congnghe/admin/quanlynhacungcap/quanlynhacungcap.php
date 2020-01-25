<?php	
include('../../config/config.php');

if(isset($_POST['them'])){
	$tenncc = $_POST['tenncc'];
	$diachi = $_POST['diachi'];
	$email = $_POST['email'];
	$sdt_ncc = $_POST['dienthoai'];
	
	$sql = "INSERT INTO nhacungcap(tenncc, diachi, email, sdt_ncc) 
			VALUES('$tenncc', '$diachi', '$email', '$sdt_ncc')";
	insert_or_update($sql);
	
	header('location:../index.php?quanly=nhacungcap&ac=lietke');	
}
elseif(isset($_POST['sua'])){
	$id_ncc = $_POST['id_ncc'];
	$tenncc = $_POST['tenncc'];
	$diachi = $_POST['diachi'];
	$email = $_POST['email'];
	$sdt_ncc = $_POST['dienthoai'];
	
	$sql = "update nhacungcap 
			set 
				tenncc='$tenncc',
				diachi='$diachi',	
				email='$email',
				sdt_ncc='$sdt_ncc'
			where id_ncc='$id_ncc'";

	insert_or_update($sql);
	
	header('location:../index.php?quanly=nhacungcap&ac=lietke');	
}

?>
