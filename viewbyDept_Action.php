<?php
	require('connect.php');
	if (!isset($_SESSION)) {
		session_start();
	}
	$db = connect_db();
	$dept = $_POST['department'];
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

	<?php
	if ($logged == true) {
	echo '
	<!-- NAVBAR -->
	<nav >
		<div >
		<a class="navbar-brand" href="index.php">DBMS Project</a>
		</div>
	</nav>
	';
	}
	else {
	echo '	
	
	<!-- NAVBAR -->
	<nav>
		<div class="container-fluid">
		<a class="navbar-brand" href="index.php">DBMS Project</a>
		</div>
	</nav>
	';
	}
	?>

<body>
	<div>
		<!-- JobId, CompanyName, JobTitle, Salary -->
		<div class="table-responsive"><table class="table">
			<thead>
				<tr class="success"><th>Course ID</th><th>Course Name</th><th>Department Name</th>
			</thead>
			<tbody>
				<?php
				
				$sql = "SELECT C.CourseId AS 'Course ID', C.CourseName AS 'Course Name', C.DepartmentName AS 'Department Name' FROM Course C WHERE DepartmentName = '$dept';";
				$result = mysqli_query($db,$sql);
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						$courseid = $row['Course ID'];
						$coursename = $row['Course Name'];
						$departmentname = $row['Department Name'];
						
				?>
				<tr class="info">
					<td><?=$courseid?></td>
					<td><?=$coursename?></td>
					<td><?=$departmentname?></td>
					
				</tr>
				<?php
					}
				}
				mysqli_close($db);
				?>
			</tbody>
		</table></div>
			<div><a  href="index.php">Go Back</a></div>
	</div>
</body>
</html>