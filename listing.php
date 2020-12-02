<?php 
require_once('config.php');
// require('config.php');
// include_once('config.php');
// include('config.php');

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
<!doctype html>
<html>
<head>
<title>Database Connection</title>
</head>
<body>

<table border="1" cellpadding="5" cellspacing="0">
<tr>
	<td>User ID</td>
	<td>Username</td>
	<td>Password</td>
	<td>Email</td>
</tr>
<?php
$sql = "SELECT * FROM tbl_user";

$rs = mysqli_query($conn, $sql);

if(mysqli_num_rows($rs)){
	// $rec = mysqli_fetch_array($rs);
	// $rec = mysqli_fetch_row($rs);
	 // $rec = mysqli_fetch_assoc($rs);
	
	// echo '<pre>';
		// print_r($rec);
	// die;
	
	while($rec = mysqli_fetch_assoc($rs)){
		?>
		
<tr>
	<td><?php echo $rec['user_id']; ?></td>
	<td><?php echo $rec['username']; ?></td>
	<td><?php echo $rec['password']; ?></td>
	<td><?php echo $rec['email']; ?></td>
</tr>		
		
		<?php
	}
	
}
?>

</table>



</body>
</html>