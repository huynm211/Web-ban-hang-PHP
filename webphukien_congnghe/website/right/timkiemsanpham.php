<?php
	include('../../config/config.php');
	$tensp = $_POST['tensp'];
	if($tensp !== '') {
		$output = '';
		$sql = "select id_sanpham, tensp, giasp, hinhanh from sanpham where tensp like '%". $tensp ."%'";
		$result = select_query($sql);
		if(count($result) > 0) {
			foreach($result as $item) {
				$output .= '<ul class="product">';
				$output .= 	'<li>
								<a href="?quanly=chitietsanpham&id_sanpham='.$item['id_sanpham'].'">';
        		$output .= 		'<img src="../admin/quanlysanpham/uploads/'.$item['hinhanh'].'" width=150 height=150 />';
				$output .= 		'<div style="height:40px;">';
				$output .= 		'<p id="tensp">'.$item['tensp'].'</p></div>';
				$output .= 		'<p id="giasp">'.number_format($item['giasp']).' VNĐ</p>';
				$output .= 		'</a>
							</li>';
				$output .= '</ul>';				
			}
			echo $output;
		} else{
			echo 'Không tìm thấy kết quả phù hợp';
		}
	}
	else{echo '<p>unset</p>';}
	
	
?>
	
