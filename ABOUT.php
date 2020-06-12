<?php

session_start();
$host = "localhost";
$user = "root";
$password = '';
$db_name = "projectwnd";
$con = mysqli_connect($host,$user,$password,$db_name);
$sql = 'SELECT * FROM tasks';
$result = mysqli_query($con,$sql);
//$tasks = mysqli_fetch_a($result, MYSQLI_ASSOC);



$sql1 = 'SELECT `category_id`, `category_name`, `category_discription` FROM `category` WHERE 1';

$result = mysqli_query($con, $sql1);


?>












<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>HOME</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

    <input type="checkbox" id="check">
    <header>
        <label for="check">
            <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <div class="left_area">
            <h3>TASK <span>MANAGER</span></h3>
        </div>
        <div class="right_area">
            <a href="taskfillsheet.php" class="logout_btn">ADD TASK</a>
        </div>
    </header>
    <div class="sidebar">

        <a href="HOMEPAGE.php"><i class="fas fa-home"></i><span>HOME</span></a>
        <a href="#" class="dropdown-btn"><i class="fab fa-buromobelexperte "></i><span>CATEGORY
                <i class="fa fa-caret-down"></i></span>
        </a>
        <div class="dropdown-container">
		  <?php while($row = mysqli_fetch_array($result)):; ?>
		   <a href="SUBHOME.php?catid=<?php echo htmlspecialchars($row[0]) ?>"><span><?php echo htmlspecialchars($row[1]) ?></span></a>
		    <?php endwhile; ?>
			<?php mysqli_close($con) ?>
            <a href="ADDCAT.php"><span><i class="fa fa-plus-circle" aria-hidden="true"></i>Add category</span></a>
        </div>
        
        <a href="#"><i class="fas fa-info-circle"></i><span>ABOUT</span></a>
        <a href="signout.php"><i class="fas fa-sign-out-alt"></i><span>SIGN OUT</span></a>
    </div>

    
	
	

    <div class="posi container">
        <h2>ABOUT</h2>
        <div class="container">
The project Task Manager helps us to add the tasks that include the all the options such as time,category,priority ..etc.
The home page contains the all the tasks added by user but the category page contains the category belongs to the respective category.
</div>
      </div> 


    <script>

        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>
</body>

</html>