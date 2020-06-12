<?php

session_start();
$host = "localhost";
$user = "root";
$password = '';
$db_name = "projectwnd";
$con = mysqli_connect($host,$user,$password,$db_name);

if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
}else{
echo "Connected successfully";}



$tasktitle = $_POST['tasktitle'];
$taskdiscription = $_POST['taskdiscription'];
$priority = $_POST['priority'];
$categoryid = $_POST['category'];
//$categoryid = 6;
//$taskstatus = 0;
$userid = 2;
$date = $_POST['date'];
$time = $_POST['time'];
$taskstatus = $_POST['tick'];



	


$tasktitle = stripcslashes($tasktitle);
$taskdiscription = stripcslashes($taskdiscription);

$tasktitle = mysqli_real_escape_string($con, $tasktitle);
$taskdiscription = mysqli_real_escape_string($con, $taskdiscription);



$sql = "select * from tasks where task_title = '$tasktitle'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
if($count ==1){
  echo "<h1><centre>title is already taken seleck another one</centre></h1>";
  }else{
 // $reg= "insert into user_information(task_title , task_discription ,task_priority,task_status,task_date,task_time) values ('$tasktitle','$taskdiscription','$priority','$tick','$date','$time','')";
   $reg = "INSERT INTO `tasks`(task_title, task_discription, task_priority, task_status, task_date, task_time, user_id, category_id) VALUES ('$tasktitle','$taskdiscription','$priority','$taskstatus','$date','$time','$userid','$categoryid')";
 mysqli_query($con, $reg);
  echo "<h1><centre>registration successful</centre></h1>";
  header('location:HOMEPAGE.php');
  }






?>