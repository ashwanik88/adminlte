<?php

function addAlert($type, $msg){
	$_SESSION['alert']['type'] = $type;
	$_SESSION['alert']['msg'] = $msg;
}

function showAlert(){
	$html = '';
	if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])){
		
	$type = $_SESSION['alert']['type'];
	$msg = $_SESSION['alert']['msg'];
	
	$html = '<div class="alert alert-'. $type .' alert-dismissible fade show" role="alert">';
	$html .= $msg;
	$html .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
	$html .= '<span aria-hidden="true">&times;</span>
		  </button>
		</div>';
		unset($_SESSION['alert']);
	}
	echo $html;
}

function redirect($page){
	header('Location: ' . $page);
	die;
}

function authUser(){
	if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
		redirect('index.php');
	}
}

function checkUserLogin($conn, $username, $password){
	$sql = "SELECT * FROM tbl_user WHERE username='". $username ."' AND password='". $password ."'";
	
	$rs = mysqli_query($conn, $sql);
	if(mysqli_num_rows($rs)){
		$rec = mysqli_fetch_assoc($rs);
		
		$_SESSION['user'] = $rec;
		
		if(isset($_POST['remember']) && !empty($_POST['remember'])){
			setcookie('username', $username, time() + 3600);
			setcookie('password', $password, time() +  3600);
		}
		
		addAlert('success', 'Welcome to admin panel!');
		redirect('dashboard.php');
	}else{
		addAlert('danger', 'Invalid username/password!');
		redirect('index.php');
	}
}