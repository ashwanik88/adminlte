<?php
authUser();	
$page_title = 'Manage Users';

$sorting = '';
$order = 'ASC';

if(isset($_GET['sort']) && !empty($_GET['sort']) && isset($_GET['order']) && !empty($_GET['order']) ){
    $sort = $_GET['sort'];
    $order = $_GET['order'];
    $sorting = ' ORDER BY '. $sort .' ' . $order;

    $order = ($order == 'ASC')?'DESC':'ASC';
}


$sql = "SELECT * FROM tbl_user" . $sorting;

$rs = mysqli_query($conn, $sql);

$data = array();

if(mysqli_num_rows($rs)){
	while($rec = mysqli_fetch_assoc($rs)){
		$data[] = $rec;
	}
}
