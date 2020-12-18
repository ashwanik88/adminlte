<?php
$arr = array(1,2,3,4,5,6);	// 1 d array
$arr[6] = 7;

$arr = array(
	array(1,2,3,4,5),
	array(1,2,3,4,5),
	array(1,2,3,4,5),
	array(1,2,3,4,5)
);	// 2 d array

$arr[3][5] = 6;


// $arr = array(
	// array(
		// array(1,2,3,4),
		// array(1,2,3,4),
		// array(1,2,3,4),
	// ),
	// array(
		// array(1,2,3,4),
		// array(1,2,3,4),
		// array(1,2,3,4),
	// ),
	// array(
		// array(1,2,3,4),
		// array(1,2,3,4),
		// array(1,2,3,4),
	// ),
	// array(
		// array(1,2,3,4),
		// array(1,2,3,4),
		// array(1,2,3,4),
	// ),
// );

// $arr[3][2][4] = 5;

echo '<pre>';
print_r($arr);

foreach($arr as $key=>$val){
	foreach($val  as $k=>$v){
		print_r($v);
		echo "\n";
	}
}
die;