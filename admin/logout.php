<?php require_once('include/startup.php'); 

unset($_SESSION['user']);

setcookie('username', $username, time() - 3600);
setcookie('password', md5($password), time() -  3600);

redirect('index.php');