<?php
global $conn;
function connect_db()
{
    global $conn;
   
    if (!$conn){
        $conn = mysqli_connect('localhost', 'root', '', 'webbanphukien') or die ("Can't not connect to database");
        mysqli_set_charset($conn, 'utf8');
    }
}
 
function disconnect_db()
{
    global $conn;
    if ($conn){
        mysqli_close($conn);
    }
}

function select_query($sql) {
	global $conn;
	connect_db();
	
	$query = mysqli_query($conn, $sql);
	$result = array();
			   
	// Lặp qua từng record và đưa vào biến kết quả
	if ($query){
		while ($row = mysqli_fetch_assoc($query)){
			$result[] = $row;
		}
	}
	
	return $result;
}

function insert_or_update($sql) {
	global $conn;
	connect_db();
	
	$is_success = false;
	$query = mysqli_query($conn, $sql);

	if ($query) {
		return true;
	}
	
	return $is_success;
}
?>
