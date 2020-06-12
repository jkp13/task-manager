<?php

session_start();
$host = "localhost";
$user = "root";
$password = '';
$db_name = "projectwnd";
$con = mysqli_connect($host,$user,$password,$db_name);

$username = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['password'];

$username = stripcslashes($username);
$email = stripcslashes($email);
$password = stripcslashes($password);

$username = mysqli_real_escape_string($con, $username);
$email = mysqli_real_escape_string($con, $email);
$password = mysqli_real_escape_string($con, $password);

$sql = "select * from user_information where user_name = '$username' and user_password= '$password'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
if($count ==1){
  header('location:HOMEPAGE.php');
  
  }else{
    header('location:INDEX.php');
  }

?>