<?php
	require('controller.php');
	if(!isset($_SESSION)) {
		session_start();
	}
	if (isset($_POST['username'])) 
	{
		$table = "Login";
		$db = connect_db();
		
		// sanitize
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$pw = mysqli_real_escape_string($db,$_POST['password']);
		$password = password_hash($pw, PASSWORD_BCRYPT);
		// check entered information
		$sql = "SELECT * FROM $table WHERE Username = '$username'";
		$result = mysqli_query($db, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		if ($count < 1) {
			$_SESSION['username'] = $username;
			$sql = "INSERT INTO $table (UserID, Username, Password) VALUES (NULL, '$username', '$password');";
			$result = mysqli_query($db, $sql);
			if ($db->query($sql) === TRUE) {
				//echo ('created');
				header("location: index.php");
			}
			else {
				//echo ('whoops');
				header("location: createAccount.php");
			}
		}
		else {
			$_SESSION['invalid'] = "Username is already taken.";
			//echo ('whoops2');
			header("location: createAccount.php");
		}
		mysqli_close($db);
	}	
?>