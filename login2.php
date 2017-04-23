<?php

require('connect.php');

if(!isset($_SESSION)) {
	session_start();
	}
	if (isset($_POST['username'])) {
		$table = "Users";
		$db = connect_db();
		
		$query = "SELECT * FROM $table WHERE Username = '$username';";
		$result = mysqli_query($db, $sql);
		$rows = mysqli_fetch_array($result, MYSQLI_ASSOC);
		if($result->num_rows == 1) {
			$_SESSION['username'] = $username;
			}
		else {
		$_SESSION['invalid'] = "your info was wrong";
		}
		mysqli_close($db);
		}
	?>