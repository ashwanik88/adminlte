<?php
authUser();	
$page_title = 'Manage Categories';

$sorting = '';
$order = 'ASC';
$pagestart = 0;
$pagesize = 10;
$cur_page = 0;

if(isset($_GET['user_ids']) && !empty($_GET['user_ids'])){
	if(sizeof($_GET['user_ids'])){
	foreach($_GET['user_ids'] as $user_id){
		$sql = "DELETE FROM tbl_user WHERE user_id='". (int)$user_id ."'";
		mysqli_query($conn, $sql);
	}
	addAlert('success', 'User record has been deleted successfully!');
	redirect('manage_users.php');
	}
}

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

$where = " WHERE 1=1 ";
//user_id=&username=admin&fullname=&phone=&email=&date_added=&status=1
$user_id = '';
if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
	$user_id = $_GET['user_id'];
	$where .= " AND user_id = '". $user_id ."' ";
}
$username = '';
if(isset($_GET['username']) && !empty($_GET['username'])){
	$username = $_GET['username'];
	$where .= " AND username LIKE '%". $username ."%' ";
}

echo $sql = "SELECT * FROM tbl_user" . $where . $sorting;

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
