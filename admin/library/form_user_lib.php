<?php
authUser();	
$page_title = 'Add User';

$data = array(
	'username'	=> '',
	'password'	=> '',
	'confirm'	=> '',
	'fullname'	=> '',
	'email'		=> '',
	'phone'		=> '',
	'status'	=> ''
);

$is_edit = false;
if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
	$user_id = $_GET['user_id'];
	$page_title = 'Edit User | ' . $user_id;
	$is_edit = true;
	$data = getUser($conn, $user_id);
}

if($_POST){
	if(isset($_POST['username']) && !empty($_POST['username'])){
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$confirm = $_POST['confirm'];
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$status = $_POST['status'];
		
		$filename = '';
		
		if(isset($_FILES['flpUpload']) && !empty($_FILES['flpUpload'])){
			if($_FILES['flpUpload']['type'] == 'image/jpeg'){
				$src_path = $_FILES['flpUpload']['tmp_name'];
				$filename = 'profile/' .time() . '_'. $_FILES['flpUpload']['name'];
				$dis_path = DIR_UPLOADS . $filename;
				
				move_uploaded_file($src_path, $dis_path);
				
			}
		}
		
		if($is_edit){
			$sql = "UPDATE tbl_user SET username='". $username ."', password='". md5($password) ."', fullname='". $fullname ."', email='". $email ."', profile_photo='". $filename ."', phone='". $phone ."', status='". (int)$status ."' WHERE user_id='". (int)$user_id ."'";			
			addAlert('success', 'User updated successfully!');
		}else{
			$sql = "INSERT tbl_user SET username='". $username ."', password='". md5($password) ."', fullname='". $fullname ."', email='". $email ."', profile_photo='". $filename ."', phone='". $phone ."', status='". (int)$status ."'";	
			addAlert('success', 'User added successfully!');
		}
		
		mysqli_query($conn, $sql);
		
		redirect('manage_users.php');
		
	}
}

function getUser($conn, $user_id){
	$sql = "SELECT * FROM tbl_user WHERE user_id='". (int)$user_id ."'";
	$rs = mysqli_query($conn, $sql);
	
	$data = array();
	
	if(mysqli_num_rows($rs)){
		$data = mysqli_fetch_assoc($rs);
	}
	return $data;
}