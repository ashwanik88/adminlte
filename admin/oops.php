<?php 
// error_reporting(E_ALL);

class myClass{
	public function __construct($aa){	// 
		echo $aa;
		echo 'Constructor is running!';
		$this->br();
	}
	
	private function abc(){
		echo 'ABC is private!';
	}

	protected function xyz(){
		$this->abc();
		$this->br();
		echo 'XYZ is protected!';
	}

	public function lmn(){
		echo 'LMN is public!';
	}
	
	function br(){	// by default access modifier is public
		echo '<br>';
	}
	
	public function add($x, $y){
		echo $x + $y;
	}
}
// private function will run with in class
// private function will run with in class

class subClass extends myClass{
	public function qrs(){
		$this->xyz();
		$this->br();
		echo 'QRS is public!';
		
	}
}
$a = 'Hello';
$obj = new subClass($a);

// $obj->abc();
$obj->br();
$obj->qrs();
$obj->br();
// $obj->xyz();
$obj->br();
$obj->lmn();
$obj->br();
$obj->add(7,5);

// myClass::abc();
// myClass::br();
// myClass::xyz();
// myClass::br();