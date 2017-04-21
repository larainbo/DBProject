<?php
	require('controller.php');
	if (!isset($_SESSION)) {
		session_start();
	}
	$db = connect_db();
	$table = "Users";
	if (isset($_SESSION['username'])) 
	{
		$sql = "SELECT UserID FROM $table WHERE Username = '" . $_SESSION['username'] . "';";
		$result = mysqli_query($db, $sql);
		if ($result->num_rows == 1)
		{
			$uid = $result->fetch_assoc();
			$uid = $uid["UserID"];
			$logged = true;
		}
		else 
		{
			$logged = false;
		}		
	}
	else
	{
		$logged = false;
	}
?>
<DOCTYPE HTML>
<html>
<head>
	<!-- jQuery -->
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">

	<!-- JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	<?php
	if ($logged == true) {
	echo '
	<!-- NAVBAR -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
		<a class="navbar-brand" href="index.php">DBMS Project</a>
		<a class="navbar-brand" href="logout.php" style="float: right">Logout</a>
		</div>
	</nav>
	';
	}
	else {
	echo '	
	
	<!-- NAVBAR -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
		<a class="navbar-brand" href="index.php">DBMS Project</a>
		<a class="navbar-brand" href="createAccount.php" style="float:right">Create Account</a>
		<a class="navbar-brand" href="login.php" style="float: right">Login</a>
		</div>
	</nav>
	';
	}
	?>
</head>

<body style="background-image:url(bg.png); background-size:cover; background-repeat:no-repeat; background-position:center center">
	<div class="container">
		<h2>Please Enter the Application Information</h2>
		<form method="post" action="addApp_action.php">
			<div class="form-group">
			<label>Student ID</label>
			<input type="number" name="studentid" id="studentid" class="form-control" required>
			</div>
			<div class="form-group">
			<label>Course ID</label>
			<input type="number" name="jobid" id="jobid" class="form-control" required>
			</div>
			<button type="submit" class="btn btn-info">Add Application!</button>
			or
			<a class="btn btn-info" href="index.php">Go Back</a>
		</form>
	</div>
</body>
</html>