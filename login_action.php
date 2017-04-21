<?php
	require('controller.php');
	
	if(!isset($_SESSION)) {
		session_start();
	}
	if (isset($_POST['username'])) {
		$table = "Users";
		$db = connect_db();
		
		// sanitize
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$pw = mysqli_real_escape_string($db,$_POST['password']);
		// check entered information
		$sql = "SELECT * FROM $table WHERE Username = '$username';";
		$result = mysqli_query($db, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		if ($result->num_rows == 1) {
			$hash = $row['Password'];
			if (password_verify($pw, $hash)) {
				$_SESSION['username'] = $username;
				echo('session set!');
				header("location: index.php");
			}
			else {
				$_SESSION['invalid'] = "Your entered information was invalid.";
				echo($_SESSION['invalid']);
				header("location: login.php");
			}
		}
		else {
			$_SESSION['invalid'] = "Your entered information was invalid.";
			echo('the query failed');
			header("location: login.php");
		}
		mysqli_close($db);
	}
?>