<?php
authUser();	
$page_title = 'Add Category';

$data = array(
	'category_name'	=> '',
	'parent_id'	=> '',
);

$is_edit = false;
if(isset($_GET['category_id']) && !empty($_GET['category_id'])){
	$category_id = $_GET['category_id'];
	$page_title = 'Edit User | ' . $category_id;
	$is_edit = true;
	$data = getUser($conn, $category_id);
}

if($_POST){
	if(isset($_POST['category_name']) && !empty($_POST['category_name'])){
		$category_name = $_POST['category_name'];
		$parent_id = $_POST['parent_id'];
		if($is_edit){
			$sql = "UPDATE tbl_category SET category_name='". $category_name ."', parent_id='". $parent_id ."' WHERE category_id='". (int)$category_id ."'";			
			addAlert('success', 'User updated successfully!');
		}else{
			$sql = "INSERT tbl_category SET category_name='". $category_name ."', parent_id='". $parent_id ."'";	
			addAlert('success', 'User added successfully!');
		}
		mysqli_query($conn, $sql);
		redirect('manage_categories.php');
	}
}


function getUser($conn, $category_id){
	$sql = "SELECT * FROM tbl_category WHERE category_id='". (int)$category_id ."'";
	$rs = mysqli_query($conn, $sql);
	
	$data = array();
	
	if(mysqli_num_rows($rs)){
		$data = mysqli_fetch_assoc($rs);
	}
	return $data;
}

function getCategories($conn, $parent_id){
	$sql = "SELECT * FROM tbl_category WHERE parent_id='". (int)$parent_id ."'";
	$rs = mysqli_query($conn, $sql);
	
	$data = array();
	
	if(mysqli_num_rows($rs)){
		while($rec = mysqli_fetch_assoc($rs)){
			$data[] = $rec;
		}
	}
	return $data;
}

function displayCategories($conn, $sep = '', $category_id = 0){
	$categories = getCategories($conn, $category_id);
	$html = '';
	if(sizeof($categories)){ foreach($categories as $category){
		$html .= '<option value="'. $category['category_id'].'">'. $sep . $category['category_name'].'</option>';
		$html .= displayCategories($conn, $sep . '----', $category['category_id']);
	}}
	return $html;
}