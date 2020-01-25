<?php	
include('../../config/config.php');

$tensp = $_POST['tensp'];
$giasp = $_POST['gia'];
$mota = $_POST['mota'];
$soluong = $_POST['soluong'];
$baohanh = $_POST['baohanh'];
$id_loaisp = $_POST['loaisp'];
$id_ncc = $_POST['nhacungcap'];

$hinhanh=$_FILES['hinhanh']['name'];
$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
	
if(isset($_POST['them'])){
	
	$sql = "INSERT INTO 
				sanpham(tensp, giasp, mota, soluong, baohanh, hinhanh, id_loaisp, id_ncc) 
			VALUES				
				('$tensp', $giasp, '$mota', $soluong, $baohanh, '$hinhanh', $id_loaisp, $id_ncc)";
	
	$final = insert_or_update($sql);
	
	header('location:../index.php?quanly=sanpham&ac=lietke');	
}
elseif(isset($_POST['sua'])){
	
	if($hinhanh!=''){
		$sql = "update sanpham 
	  			set 
					tensp = '$tensp', giasp =  $giasp, mota = '$mota', 
					soluong = $soluong, baohanh = $baohanh, hinhanh = '$hinhanh',
					id_loaisp =  $id_loaisp, id_ncc = $id_ncc
				where id_sanpham='$_GET[id_sanpham]'
				";
		}else{
			$sql = "update sanpham 
	  			set 
					tensp = '$tensp', giasp =  $giasp, mota = '$mota', 
					soluong = $soluong, baohanh = $baohanh,
					id_loaisp =  $id_loaisp, id_ncc = $id_ncc
				where id_sanpham='$_GET[id_sanpham]'
				";
		}

	insert_or_update($sql);
	
	header('location:../index.php?quanly=sanpham&ac=lietke');	
}

?>
