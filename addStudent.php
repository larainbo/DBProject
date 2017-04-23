<?php
	require('connect.php');
	if (!isset($_SESSION)) {
		session_start();
	}
	$db = connect_db();
	$table = "Users";
	$sql = "SELECT * FROM Major";
	$result = mysqli_query($db, $sql);
	if ($result->num_rows > 0) 
	{
		while ($row = $result->fetch_assoc())
		{
			$majors[] = $row['Major'];
		}
	}
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
	
	<?php
	if ($logged == true) {
	echo '
	<!-- NAVBAR -->
	<nav>
		<div>
		<a  href="index.php">DBMS Project</a>
		</div>
	</nav>
	';
	}
	else {
	echo '	
	
	<!-- NAVBAR -->
	<nav >
		<div>
		<a  href="index.php">DBMS Project</a>
		<a  href="login.php" style="float: right">Login</a>
		</div>
	</nav>
	';
	}
	?>
</head>

<body >
	<div >
		<h2>Please Enter the Student's Information</h2>
		<form method="post" action="addStudent_action.php">
			<div>
			<label>Student ID</label>
			<input type="text" name="studentid" id="studentid" class="form-control" required>
			</div>
			<div >
			<label>Student Name</label>
			<input type="text" name="studentname" id="studentname" class="form-control" required>
			</div>
			<div >
			<label>Major</label>
					<select name="major" id="major">
					<?php
					for ($i = 0; $i < sizeof($majors); $i++) 
					{
					?>
					<option value="<?=$majors[$i]?>"><?=$majors[$i]?></option>
					<?php
					}
					?>
				</select>
			</div>
			<button type="submit" class="btn btn-info">Add Student!</button>
			or
			<a href="index.php">Go Back</a>
		</form>
	</div>
</body>
</html>