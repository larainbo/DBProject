<?php
	require('controller.php');
	if(!isset($_SESSION)) {
		session_start();
	}
	if (isset($_POST['studentid'])) 
	{
		$db = connect_db();
		$studentid = mysqli_real_escape_string($db,$_POST['studentid']);
		$studentname = mysqli_real_escape_string($db,$_POST['studentname']);
		$major = $_POST['major'];
	
		$sql = "SELECT MajorId FROM Major WHERE Major = '$major';";
		$result = mysqli_query($db, $sql);
		if ($result->num_rows == 1)
		{
			$majorid = $result->fetch_assoc();
			$majorid = $majorid["MajorId"];
		
			$sql = "INSERT INTO Student VALUES ($studentid, '$studentname', $majorid);";
			$result = mysqli_query($db, $sql);
		}
	}
	mysqli_close($db);
	header("location: addStudent.php");
?>