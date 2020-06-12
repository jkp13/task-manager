<?php 
session_start();
$host = "localhost";
$user = "root";
$password = '';
$db_name = "projectwnd";
$con = mysqli_connect($host,$user,$password,$db_name);

//$ids = $_GET['id'];
//echo $ids;


$sql = "SELECT * FROM tasks WHERE task_id= {$ids}";
$result = mysqli_query($con,$sql);
$res = mysqli_fetch_array($result);

if(isset($_POST['date'])){
$edid = $_GET['id'];


$taskdiscription = $_POST['taskdiscription'];
$priority = $_POST['priority'];
$categoryid = $_POST['category'];
$taskstatus = 0;
$userid = 1;
$date = $_POST['date'];
$time = $_POST['time'];
//$tick = $_POST['tick'];

//$query = " UPDATE tasks SET task_discription=`$taskdiscription`,task_priority=`$priority`,
//task_status=`$taskstatus`,task_date=`$date`,task_time=`$time` WHERE task_id= 11 ";
$query = "UPDATE `tasks` SET `task_discription`='$taskdiscription',`task_priority`='$priority',`task_status`= $taskstatus WHERE task_id ={$edid}";
$ress = mysqli_query($con,$query);



}












 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">




    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-datetimepicker.min.css">
    <script src="bootstrap-datetimepicker.min.js"></script>
<style>
 .login-box{
  max-width: 700px;
  float:none;
  margin : 150px auto;
  background: rgba(211,211,211,0.5);
 padding: 30px;
  }
  body{
  background: linear-gradient(rgba(0,0,50,0.5),rgba(0,0,50,0.5)),url(https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ5z9GOdlXyJ5t1Uiijf7_uu4yB-J_XMusCcUwUQ0mJswbaPg69&usqp=CAU); 
 background-size: cover;
 background-position: center;
 }
</style>
    <title>taskfill</title>
  </head>
  <body>
     <div class="container">
     <div class=login-box>
	 <h1 class="text-center text-red">EDIT TASK</h1>
    <form action="taskupdate.php" method="POST">
	
	<fieldset disabled>
  <div class="form-group">
    <label for="titleoftext">Title for task:</label>
    <input type="text" class="form-control" id="titleoftext" placeholder="Enter title" name="tasktitle" value="<?php echo htmlspecialchars($res['task_title']); ?>" >
  </div>
  </fieldset>
  
<div class="form-group">
    <label for="dis">Discription:</label>
    <textarea class="form-control" id="dis" rows="3" placeholder="Discription about task" name="taskdiscription" value="<?php echo htmlspecialchars($res['task_discription']); ?>"></textarea>
  </div>
  
  <label for="one">Priority:</label>
  <select class="form-control" id="one" name="priority" >
  <option value="">--select--</option>
  <option value="high">HIGH</option>
  <option value="medium">MEDIUM</option>
  <option value="low">LOW</option>
</select>
<fieldset disabled>
<label for="two">Category:</label>
  <select class="form-control" id="two" name="category">
  <option value="">--select--</option>
</select>
</fieldset>

<div class="form-group">
    <label for="Date">Date:</label>
    <input type="date" class="form-control" id="Date" name="date" value="<?php echo htmlspecialchars($res['task_date']); ?>">
  </div>
  
  <div class="form-group">
    <label for="time">Time:</label>
    <input type="time" class="form-control" id="time" name="time" value="<?php echo htmlspecialchars($res['task_time']); ?>" >
  </div>
  
  


  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="tick" value="1">
    <label class="form-check-label" for="exampleCheck1">Tick the box if task completed</label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
</form>
</div>
</div>


    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
 </body>
</html>