
<?php

session_start();
$host = "localhost";
$user = "root";
$password = '';
$db_name = "projectwnd";
$con = mysqli_connect($host,$user,$password,$db_name);



$categoryname = $categorydiscription ='';
$error = array('categoryname' => '', 'categorydiscription' => '');
if(isset($_POST['submit'])){
     
	 //check user
	 if(empty($_POST['categoryname'])){
	    $error['categoryname'] = 'An category name is required';
	 }
	  if(empty($_POST['categorydiscription'])){
	    $error['categorydiscription'] = 'An category discription is required';
	 }
	 
	 
	 if(array_filter($error)){
}else{
//	$username = $_POST['user'];
//    $email = $_POST['email'];
//    $password = $_POST['password'];
	
$categoryname = mysqli_real_escape_string($con, $_POST['categoryname']);
$categorydiscription = mysqli_real_escape_string($con, $_POST['categorydiscription']);
$user_id = 2;


$reg= "INSERT INTO `category`(`category_name`, `category_discription`, `user_id`) VALUES ('$categoryname','$categorydiscription`','$user_id')";
if(mysqli_query($con,$reg)){
	header("location: HOMEPAGE.php");
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
  <title>ADD CATEGORY</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
  .login-box{
  max-width: 700px;
  float:none;
  margin : 150px auto;
  }
  body{
  background: linear-gradient(rgba(0,0,50,0.5),rgba(0,0,50,0.5)),url(https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRySLhM7m-om9p_78jfDVxdsww8L-N6YRn_kuhg0WnRFmHc3bTW&usqp=CAU); 
 background-size: cover;
 background-position: center;
 }
 
 .login-right{
 background :white;
 padding: 30px;
 }
 .redtext{
   color : red ;
 }
 
 
  </style>
</head>
<body>
<div class="container">
<div class="login-box">
<div class="row">


<div class="col-md-6 login-right">
<h2>Add Category</h2>
<form action="timepass9.php" method="POST">
<div class="form-group">

<input type="text" name="categoryname" class="form-control required" placeholder="category name">
<div class="redtext"><?php echo $error['categoryname']; ?></div>
</div>
<div class="form-group">

<input type="text" name="categorydiscription" class="form-control required" placeholder="category discription">
<div class="redtext"><?php echo $error['categorydiscription']; ?></div>
</div>

<button type="submit" name="submit" class="btn btn-primary">ADD</button>
</form>
</div>
</div>
</div>
</div>
</body>