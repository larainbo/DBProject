<?php
	require('connect.php');
	if(!isset($_SESSION)) {
		session_start();
	}
	$table = "Users";
	
	$db = connect_db();
	// Check if user is logged in
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
		$logged = true;
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
</head>

<body>
	<div>
		<br>
		<div>
			<form action="addStudent.php">
				<input  type="submit" value="Add a Student">
			</form>
			<form action="addCourse.php">
				<input  type="submit" value="Add a Course">
			</form>
			<form action="addApp.php">
				<input type="submit" value="Add an Application">
			</form>
			<form action="viewStudents.php">
				<input  type="submit" value="View All Students">
			</form>
			<form action="viewCourse1.php">
				<input type="submit" value="View All Courses by department">
			</form>
			<form action="viewCourse2.php">
				<input  type="submit" value="View All Courses by Student">
			</form>
	';
}
else {
	echo '
<head>
	<nav>
		<div>
		<a  href="index.php">DBMS Project</a>
		<a  href="login1.php" style="float: right">Login</a>
		</div>
	</nav>
</head
<body>
	<div>
		<br>
		<div>
			<form action="addStudent.php">
				<input  type="submit" value="Add a Student">
			</form>
			<form action="addApp.php">
				<input type="submit" value="Add an Application">
			</form>
			<form action="viewStudents.php">
				<input  type="submit" value="View All Students">
			</form>
			<form action="viewCourse.php">
				<input  type="submit" value="View All Courses">
			</form>
	';
}
?>
		</div>
	</div>
</body>
</html>