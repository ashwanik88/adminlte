<?php
authUser();	
$page_title = 'Manage Users';

$sorting = '';
$order = 'ASC';
$pagestart = 0;
$pagesize = 10;
$cur_page = 0;

if(isset($_GET['page']) && !empty($_GET['page'])){
	$cur_page = $_GET['page'];
	$pagestart = ($cur_page-1)*$pagesize;
}

if(isset($_GET['sort']) && !empty($_GET['sort']) && isset($_GET['order']) && !empty($_GET['order']) ){
    $sort = $_GET['sort'];
    $order = $_GET['order'];
    $sorting = ' ORDER BY '. $sort .' ' . $order;

    $order = ($order == 'ASC')?'DESC':'ASC';
}

$paging= " LIMIT ". $pagestart .", " . $pagesize;

$sql = "SELECT * FROM tbl_user" . $sorting;
$rs_total = mysqli_query($conn, $sql);
$page_total = mysqli_num_rows($rs_total);

$sql .= $paging;



$rs = mysqli_query($conn, $sql);

$data = array();

if(mysqli_num_rows($rs)){
	while($rec = mysqli_fetch_assoc($rs)){
		$data[] = $rec;
	}
}
