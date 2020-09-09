<?php
include("DB_connect.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add New Student Information</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
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
   color: black;
   background-color: #e6e6e6;
   padding: 10px 10px;
}
.hello {
	margin-left: 30%;
}
		body{background: #ffffcc;color:white}
		a{font-size: 15px;color: white;text-decoration: none;padding-right: 5px;}
		a:hover{color: #AAAAAA;}

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
<?php  

				echo "<p style='margin-top: 50px;color:red;font-size: 30px;'></p>";
				echo "<p style='margin-top: 50px;color:#27B127;font-size: 30px;'></p>";
				echo "<h2 style='margin-top: 50px; color:red;'>Enter Roll & Name and Select Department & Session. </h2>";
				
				echo '<form action="" method="post">';
				?>
				<?php

				echo '<p style="color:green">Roll<br><input type="text" name="roll" placeholder="Enter Roll"><br></p>
				<p style="color:blue">Name<br><input type="text" name="name" placeholder="Enter Name"><br></p>'
				?>

<?php 
				echo '<p style="color:#cc6600;">Department<br><select name="department">
						<option selected="selected" value="CSE">CSE</option>
						<option value="EEE">EEE</option>
						<option value="ICE">ICE</option>
						<option value="ETE">ETE</option>
					</select></p>';

				echo '<p style="color:red;">Session<br><select name="session">
						<option value="2013-14">2013-14</option>
						<option selected="selected" value="2014-15">2014-15</option>
						<option value="2015-16">2015-16</option>
						<option value="2016-17">2016-17</option>
					</select></p>';	

				echo'<input type="submit" name="submit" value="Submit"></form>';
			
		?>
		<br><br><a href = "Home.html" style="color: black">Click here to go back home page</a>
</div>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
		
		$roll=$_POST['roll'];
		$name=$_POST['name'];
		$department = $_POST['department'];
		$session = $_POST['session'];
			
		$sql = "INSERT into student(roll,name,department,session) values('$roll','$name','$department','$session')";
		$res = mysqli_query($conn,$sql);
		//include('Home.html');
		if ($res) {
			echo "Information inserted successfully";
		}
		else{
			echo "Difficulty in Insertion";
		}

	}
?>