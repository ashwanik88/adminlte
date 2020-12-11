<?php
authUser();	
$page_title = 'Manage Users';

$sql = "SELECT * FROM tbl_user";

$rs = mysqli_query($conn, $sql);

$data = array();

if(mysqli_num_rows($rs)){
	while($rec = mysqli_fetch_assoc($rs)){
		$data[] = $rec;
	}
}
