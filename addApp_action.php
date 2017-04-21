<?php
	require('controller.php');
	if(!isset($_SESSION)) {
		session_start();
	}
	if (isset($_POST['studentid'])) 
	{
		$db = connect_db();
		$studentid = $_POST['studentid'];
		$jobid = $_POST['courseid'];
	
		$sql = "INSERT INTO Enrollment (CourseID, StudentID) VALUES ('$courseid', '$studentid');";
		$result = mysqli_query($db, $sql);
	}
	mysqli_close($db);
	header("location: addApp.php");
?>