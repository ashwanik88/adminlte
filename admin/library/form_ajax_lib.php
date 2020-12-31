<?php
authUser();	
$page_title = 'AJAX Concept';

$first_number = '';
$second_number = '';

$arr = array(
	'abc'	=> '123',
	'xyz'	=> '456',
);

// echo json_encode($arr);
// die;

// sleep(3);	// sleep for 3 secs
// Double Dollar
// foreach($arr as $key=>$val){
	// $$key = $val;
// }
// echo $abc;
// echo $xyz;
$arr = array('success' => false, 'msg' => 'Incomplete form data!');
if($_POST){
	if(isset($_POST['first_number']) && !empty($_POST['first_number']) && isset($_POST['second_number']) && !empty($_POST['second_number'])){
		$first_number = $_POST['first_number'];
		$second_number = $_POST['second_number'];
		$result = $first_number + $second_number;
		
		$arr['success'] = true;
		$arr['result'] = $result;
		$arr['msg'] = 'Total = ' . $result;
	}
	
	echo json_encode($arr);
	die;
}

/*
	task
	online chat
	
	mail()
	oops
	
*/