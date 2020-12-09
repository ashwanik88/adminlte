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