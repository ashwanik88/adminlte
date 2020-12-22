<?php 
session_start();

// echo '<pre>';
// print_r($_SERVER);
// die;

define('DIR_UPLOADS', $_SERVER['DOCUMENT_ROOT'] . '/training-ashish/php/uploads/');
define('HTTP_UPLOADS', 'http://localhost/training-ashish/php/uploads/');

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_name = 'training';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
