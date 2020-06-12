<?php

session_start();
$host = "localhost";
$user = "root";
$password = '';
$db_name = "projectwnd";
$con = mysqli_connect($host,$user,$password,$db_name);

$username = $email = $password = '';
$error = array('email' => '', 'user' => '', 'password' => '');
if(isset($_POST['submit'])){
     
	 //check email
	 if(empty($_POST['email'])){
	    $error['email'] = 'An email is required';
	 }else{
	      $email = $_POST['email'];
		  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		       $error['email'] = 'Email must be valied email';
		  }
	 }
	 //check user
	 if(empty($_POST['user'])){
	    $error['user'] = 'An user name is required';
	 }else{
	      $user = $_POST['user'];
		  if(!preg_match('/^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$/', $user)){
		       $error['user'] = 'user name must be valied Name';
		  }
	 }
	 //check password
	 if(empty($_POST['password'])){
	    $error['password'] = 'An password is required';
	 }
/*	 else{
	      $password = $_POST['password'];
		  if(!preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/', $user)){
		       $error['password'] = 'user password must be of character length 8-15,atleast one number,atleast one upperletterand atleast one lower letter';
		  }
	 }*/
	 
	 
	 if(array_filter($error)){
}else{
//	$username = $_POST['user'];
//    $email = $_POST['email'];
//    $password = $_POST['password'];
	
$email = mysqli_real_escape_string($con, $_POST['email']);
$username = mysqli_real_escape_string($con, $_POST['user']);
$password = mysqli_real_escape_string($con, $_POST['password']);

$reg= "INSERT INTO user_information(user_name , user_email ,user_password) VALUES ('$username','$email','$password')";
if(mysqli_query($con,$reg)){
	header("location: INDEX.php");
}



/*
// create sql
$sql = "select * from user_information where user_name = '$username' and user_password= '$password'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
if($count ==1){
  echo "<h1><centre>username is alreadt taken</centre></h1>";
  }else{
  $reg= "insert into user_information(user_name , user_email ,user_password) values ('$username','$email','$password')";
  mysqli_query($con, $reg);
  echo "<h1><centre>registration successful</centre></h1>";
  }*/
}
}





?>





<html lang="en">
<head>
  <title>login and registration</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
  .login-box{
  max-width: 700px;
  float:none;
  margin : 150px auto;
  }
  body{
  background: linear-gradient(rgba(0,0,50,0.5),rgba(0,0,50,0.5)),url(https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSFv_KUwxZ7VGcqha5N2hyQHOjrXjuggbM-YUJaPfnr5RLQIVPp&usqp=CAU); 
 background-size: cover;
 background-position: center;
 }
 .login-left{
 background: rgba(211,211,211,0.5);
 padding: 30px;
 }
 .login-right{
 background :white;
 padding: 30px;
 }
 .form-control{
 background-color: transparent !important;
 }
 
  </style>
</head>
<body>
<div class="container">
<div class="login-box">
<div class="row">
<div class="col-md-6 login-left">
<h2>login</h2>
<form action="login.php" method="POST">
<div class="form-group">
<lable>Username</lable>
<input type="text" name="user" class="form-control required">
</div>
<div class="form-group">
<lable>Password</lable>
<input type="password" name="password" class="form-control required">
</div>
<button type="submit" class="btn btn-primary">LOGIN</button>
</form>
</div>


<div class="col-md-6 login-right">
<h2>Register</h2>
<form action="INDEX.php" method="POST">
<div class="form-group">
<lable>Username</lable>
<input type="text" name="user" class="form-control required">
<div class="red-text"><?php echo $error['user']; ?></div>
</div>
<div class="form-group">
<lable>Email</lable>
<input type="text" name="email" class="form-control required">
<div class="red-text"><?php echo $error['email']; ?></div>
</div>
<div class="form-group">
<lable>Password</lable>
<input type="password" name="password" class="form-control required">
<div class="red-text"><?php echo $error['password']; ?></div>
</div>
<button type="submit" name="submit" class="btn btn-primary">REGISTER</button>
</form>
</div>
</div>
</div>
</div>
</body>