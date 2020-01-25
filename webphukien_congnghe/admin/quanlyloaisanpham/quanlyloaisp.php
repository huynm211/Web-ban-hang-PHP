<?php	
include('../../config/config.php');

$tenloaisp = $_POST['loaisp'];

if(isset($_POST['them'])){
	
	$sql = "INSERT INTO loaisp(tenloaisp) VALUES('$tenloaisp')";
	insert_or_update($sql);
	
	header('location:../index.php?quanly=loaisp&ac=lietke');	
}
elseif(isset($_POST['sua'])){
	$IdLoaisp = $_POST['id_loaisp'];
	
	$sql = "update loaisp set tenloaisp='$tenloaisp' where id_loaisp='$IdLoaisp'";
	insert_or_update($sql);
	
	header('location:../index.php?quanly=loaisp&ac=lietke');	
}

/*function them_loaisp($tenloaisp) {
	$sql = "INSERT INTO loaisp(tenloaisp) VALUES('$tenloaisp')";
	insert_or_update($sql);
}

function capnhat_loaisp($id, $tenloaisp) {
	$sql = "update loaisp set tenloaisp='$tenloaisp' where id_loaisp='$id'";
	insert_or_update($sql);
}*/
?>
