<?php 

$host = "localhost";
$user = "root";
$password = '';
$db_name = "projectwnd";
$con = mysqli_connect($host,$user,$password,$db_name);

$ids = $_GET['id'];
echo $ids;
$sql = "DELETE FROM tasks WHERE task_id=$ids";
if(mysqli_query($con, $sql)){
	
	header('location:HOEPAGE.php');
	
}else{
	echo "deleted failed";
	
}

 ?>