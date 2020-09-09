<?php
include("DB_connect.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Update</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		body{background: #5F5F5F;margin-bottom: 20px; color:#00ff00;}
		table, th, td {
			border: 1px solid black;
		}
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
	<h1>Update</h1>
	<form action="" method="get">
		<?php

		if (isset($_GET['roll']))
		{
			$roll = $_GET['roll'];
			echo "Roll Number : ";
			echo $roll."<br><br>";
			?>

			<input type="hidden" name="roll" value="<?php echo $roll ?>">
			<?php
			
			//echo $roll;
			$query1 = "SELECT ID,mark,type,number as number1
					FROM class_test
					WHERE roll='$roll'";
			$res1 = mysqli_query($conn,$query1);
			$query2 = "SELECT a_mark
			FROM attendence
			WHERE roll = '$roll'";
			$res2 = mysqli_query($conn,$query2);
			if(mysqli_num_rows($res1))
			{
				//$i=1;
				//$j=1;
				//$k=1;
				while($rows1= mysqli_fetch_assoc($res1))
				{
					$number=$rows1['number1'];
					//echo "Number: ";
					//echo $number;
					//echo "<br>";
					if($rows1['type']==0)
					{
						echo "Class Test: ";
						echo $rows1['number1'];
						//echo $i;
						//echo "    ";
						?>
						<input type="text" name="mark[<?=$rows1['ID']?>]" value=" <?php echo $rows1['mark'] ?> " ><br><br>
						<!--<input type="hidden" name="type[<?=$rows1['ID']?>]" value="0">-->
						<?php
						
						//$i++;
					}
					if($rows1['type']==1)
					{
						echo "Assignment: ";
						echo $rows1['number1'];
						//echo $j;
						//echo "   ";
						?>
						<input type="text" name="mark[<?=$rows1['ID']?>]" value=" <?php echo $rows1['mark'] ?> " ><br><br>
						<!--<input type="hidden" name="type[<?=$rows1['ID']?>]" value="1">-->
						<?php
						//$j++;
					}
					if($rows1['type']==2)
					{
						echo "Presentation: ";
						echo $rows1['number1'];
						//echo $k;
						?>
						<input type="text" name="mark[<?=$rows1['ID']?>]" value=" <?php echo $rows1['mark'] ?> " ><br><br>
						<!--<input type="hidden" name="type[<?=$rows1['ID']?>]" value="2">-->
						<?php
						//$k++;
					}
					
					//$i++;
				}

				?>
					
				<?php
			}
			if(mysqli_num_rows($res2))
			{
				$rows2= mysqli_fetch_assoc($res2);
				echo "Attendance: ";
				?>
				<input type="text" name="a_mark" value="<?php echo $rows2['a_mark'] ?>"><br><br>
				<?php
			}
			

		}
		
		
		?>

	<?php 
	echo'<input type="submit" name="submit" value="submit"></form>';
	?>

	<?php
	if (isset($_GET['submit'])) 
	{
		//$ID = $_GET['ID'];
		//$number=$rows1['number1'];
		$roll=$_GET['roll'];
		//$type=$_GET['type'];

		
		$mark = $_GET["mark"];
		$a_mark = $_GET['a_mark'];
		//$type = ($_GET["type"] ;
		//if(!empty($mark) && !empty($type))
		{
			//$values = array_combine($mark, $type);
		
		foreach ($_GET["mark"] as $ID=>$mark) //&& (foreach($_GET["type"] as $ID=>$type))
		{
			//foreach($_GET["type"] as $ID=>$type)
			{

			//$sql1 = "INSERT INTO class_test(ID,roll,number,mark,type) VALUES('$ID','$roll','$number','$mark','$type')";
			//echo "INSERT INTO class_test(roll,number,mark,type) VALUES('$roll','$number','$mark','$type')";
			$sql1 = "UPDATE class_test set mark=$mark WHERE ID=$ID";
			//echo "UPDATE class_test set mark=$mark WHERE ID=$ID ";
			$res2 = mysqli_query($conn,$sql1);
			//if($res2)
			//{
				//echo " Successfull.";
			//}
		}
	}
			}

			$sql2 = "UPDATE attendence set a_mark=$a_mark WHERE roll='$roll' ";
			//echo "UPDATE attendence set a_mark=$a_mark WHERE roll='$roll' ";
			$res3 = mysqli_query($conn,$sql2);
			//if($res3)
			//{
				//echo " Successfull.";
			//}
			if($res2 && $res3)
			{
				echo " Successfully Updated.";
			}

	}
	?>

	<a href="display.php" style="color:#ffff00">Go back</a><br>


	<a href = "Home.html" style="color:#ffff00">Click here to go back home page</a><br>
</div>
</body>

<html>

