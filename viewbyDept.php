<?php
	require('connect.php');
	if (!isset($_SESSION)) {
		session_start();
	}
	$db = connect_db();
	$table = "Users";
	$sql = "SELECT * FROM Course";
	$result = mysqli_query($db, $sql);
	if ($result->num_rows > 0) 
	{
		while ($row = $result->fetch_assoc())
		{
			$departments[] = $row['DepartmentName'];
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
		<a  href="login1.php" style="float: right">Login</a>
		</div>
	</nav>
	';
	}
	?>
</head>

<body >
	<div >
		<h2>Please Enter the name of the Department you want to search from</h2>
		<form method="post" action="viewbyDept_Action.php">
			<div >
			<label>Department Name</label>
					<select name="department" id="department">
					<?php
					for ($i = 0; $i < sizeof($departments); $i++) 
					{
					?>
					<option value="<?=$departments[$i]?>"><?=$departments[$i]?></option>
					<?php
					}
					?>
				</select>
			</div>
			<button type="submit">Search!</button>
			or
			<a href="index.php">Go Back</a>
		</form>
	</div>
</body>
</html>