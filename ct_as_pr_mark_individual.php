<?php
include("DB_connect.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add CT/Assignment/Presentation Mark</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		
		body{background: white;color:#00ff00}
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
  <a href="new_ct_as_pr_marks.php">New Class Test / Assignment / Presentation Mark</a>
  <a href="attendance.php">Attendance Marks</a>
  <a href="sub_attendance.php">Attendance(Session)</a>
  <a href="display.php">Show Information</a>
  <a href="aboutME.php">About Me</a>
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
		<h2 style="color:blue">Enter Type of mark, student's deparment and session </h2>
		<!--Type <br><input type="text" name="type" placeholder="CT=0,Atndnc=1,Prntsn=2"><br>NB: Class Test=0, Attendence=1, Presentation=2<br>-->
		<?php 

				echo '<p style="color:red;">Session<br><select name="session">
						<option value="2013-14">2013-14</option>
						<option selected="selected" value="2014-15">2014-15</option>
						<option value="2015-16">2015-16</option>
						<option value="2016-17">2016-17</option>
					</select></p>';	
				echo '<p style="color:blue;">Department<br><select name="department">
						<option selected="selected" value="CSE">CSE</option>
						<option value="EEE">EEE</option>
						<option value="ICE">ICE</option>
						<option value="ETE">ETE</option>
					</select></p>';
				echo 'Roll:<br> <input type="text" name="roll" placeholder="Enter roll"><br> ';
				echo 'Mark: <br> <input type="text" name="mark" placeholder="Enter mark"><br>';
				echo 'Type: <br> <input type="text" name="type" placeholder="Enter type"><br>';
				echo 'Number: <br> <input type="text" name="number" placeholder="Enter number"><br>';


				echo'<br><input type="submit" name="submit" value="Submit"></form>';


if(isset(($_POST['submit']))){
	$roll = $_POST['roll'];
	$mark = $_POST['mark'];
	$type = $_POST['type'];
	$number = $_POST['number'];



//var_dump($_POST["mark"]);
	//foreach($_POST["mark"] as $roll=>$mark)
	{
		$sql1 = "INSERT INTO class_test(roll,number,mark,type) VALUES('$roll','$number','$mark','$type')";
		//echo "INSERT INTO class_test(roll,number,mark,type) VALUES('$roll','$number','$mark','$type')";
		$res1 = mysqli_query($conn,$sql1);
		if($res1)
		{
			echo " Successfull.";
		}
	}
	
		
}

						
		?>
	</form>
	<br><br><br><a href = "Home.html" style="color:black">Click here to go back home page</a><br>
</div>
</body>

<html>

