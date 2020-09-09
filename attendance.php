<?php
include("DB_connect.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Attendence Mark</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		body{background: #e6f7ff;color:#00ff00}
		* {
    box-sizing: border-box;
}

.header {
    background-color: #b3b3b3;
    padding: 5px;
    text-align: center;
}

.topnav {
    overflow: hidden;
    background-color: #333;
}

.topnav a {
    float: left;
    display: block;
    color: violet;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.topnav a:hover {
    background-color: green;
    color: black;
}
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #e6e6e6;
   padding: 10px 10px;
   color: black;
}
.hello {
	margin-left: 30%;
}

	</style>
</head>
<body>
	<div class="header">
  <h2>Class Test, Assignment, Presentation & Attendence Management </h2>
</div>

<div class="topnav">
	<a href="Home.html">Home</a>
  <a href="new_student.php">New Student Information</a>
  <a href = "ct_as_pr_mark_individual.php">CT Individual</a>
  <a href="new_ct_as_pr_marks.php">New CT/Assignment/Presentation Mark</a>
  <a href="attendance.php">Attendance Marks</a>
  <a href="sub_attendance.php">Attendance(Session)</a>
  <a href="display.php">Show Information</a>
  <a href="aboutME.php">About</a>
</div>

<div class='footer'>
<footer >
  <i>
  <ins>  Created by:</ins>
     Md. Deloar Hossain, Dept. of Computer Science & Engineering, Roll: 150156, Session: 2014-15, Pabna University of Science & Engineering.
    Email: <a href="mailto:deloar.cse7@gmail.com" style="color: blue" >deloar.cse7@gmail.com</a>
  </i>
</footer>
</div>
<div class="hello">
	<form action="" method="post">
		<h2 style="color: blue">Enter roll and his/her attendance</h2>
		Roll<br><input type="text" name="roll" placeholder="Enter Roll"><br><br>
		Attendence<br><input type="text" name="attendence" placeholder="Attendence mark"><br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
	<br><br><a href = "Home.html" style="color:black">Click here to go back home page</a><br>
</div>
</body>

<html>

<?php
if (isset($_POST['submit'])) {
		
		$roll = $_POST['roll'];
		$attendence = $_POST['attendence'];
			
		$sql = "INSERT into attendence(roll,a_mark) values('$roll','$attendence')";
		$res = mysqli_query($conn,$sql);
		//include('Home.html');
		if ($res) {
			echo "Successfully Inserted.";
		}
		else{
			echo "Unsuccessful.";
		}

	}
?>
