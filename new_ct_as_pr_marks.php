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
	<form action="" method="get">
		<h2 style="color:blue">Enter Type of mark, student's deparment and session </h2>
		Type <br><input type="text" name="type" placeholder="CT=0,Atndnc=1,Prntsn=2"><br>NB: Class Test=0, Attendence=1, Presentation=2<br>
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

				echo'<input type="submit" name="submit" value="Submit"></form>';

				if (isset($_GET['submit'])) 
				{
					$type = $_GET['type'];
					$session = $_GET['session'];
					$department = $_GET['department'];


					/*********** delete_plz is in here **************/


//$type=0;/********************************* TYPE***********************************/
if($type==0)
{
	echo "Class Test: ";
}
elseif ($type==1) {
	echo "Assignment: ";
}
else
{
	echo "Presentation: ";
}
/*$sql = "SELECT max(number)+1 as number
		FROM class_test
		WHERE type=$type";*//******************* ************** TYPE***********************************/
$sql = "SELECT max(number)+1 as number 
		FROM class_test JOIN student ON class_test.roll= student.roll 
		WHERE type=$type AND student.department='$department' AND student.session='$session' ";

/*echo "SELECT max(number)+1 as number 
		FROM class_test JOIN student ON class_test.roll= student.roll 
		WHERE type=$type AND student.department='$department' AND student.session='$session' ";*/

$res = mysqli_query($conn,$sql);
//$check = mysqli_num_rows($res);
//echo "<br> $check <br>";
//if(is_null($check))  /******************** For Presentation:1 - Can't Insert********/

if(($row = mysqli_fetch_assoc($res)) && is_null($row['number']))
{
	$number=1;
	//var_dump($row['number']);
}
else
{
	//$rows=mysqli_fetch_assoc($res);
	//echo $rows['number'];
	$number = $row['number'];
}
//$number=1;
/*if(mysqli_num_rows($res))
{
	$rows=mysqli_fetch_assoc($res);
echo $rows['number'];
$number = $rows['number'];
}
else
{
	$number=1;
}*/

echo "number: ".$number;
echo "<br>";
echo "Tpye = ";
echo "$type";
echo "<br><br>";
$query = "SELECT roll
		FROM student
		where department= '$department' AND session= '$session'";/******** Department & Session***************/
$res = mysqli_query($conn,$query);
$i=0;


if(mysqli_num_rows($res)>0)
{
	echo '<form action="" method="post">';
	while ($rows=mysqli_fetch_assoc($res)) {
		echo "Roll:";
		echo $rows['roll'];
		//$roll[$i++] = $rows['roll'];/************************* Comment koresi **********/
		?>
		<!--<form action="" method="post">-->

		Mark:<input type="text" name="mark[<?=$rows['roll']?>]" placeholder="mark"><br><br>

		<!--</form>-->

		<?php
		//echo "<br>";
	}
	echo'<input type="submit" name="submit2" value="Submit"></form>';


	
}
}



if(isset(($_POST['submit2']))){


//var_dump($_POST["mark"]);
	foreach($_POST["mark"] as $roll=>$mark)
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

