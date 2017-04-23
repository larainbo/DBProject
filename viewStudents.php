<DOCTYPE HTML>
<html>
<?php
	require('connect.php');
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

<head>
	
	<?php
	if ($logged == true) {
	echo '
	<!-- NAVBAR -->
	<nav class="navbar navbar-inverse">
		<div >
		<a href="index.php">DBMS Project</a>
		<a href="logout.php" style="float: right">Logout</a>
		</div>
	</nav>
	';
	}
	else {
	echo '	
	<!-- NAVBAR -->
	<nav >
		<div >
		<a href="index.php">DBMS Project</a>
		</div>
	</nav>
	';
	}
	?>
</head>

<body >
	<div >
		<!-- StudentId, StudentName, Major -->
		<div class="table-responsive"><table class="table">
			<thead>
				<tr class="success"><th>Student ID</th><th>Student Name</th><th>Major</th>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT S.StudentId AS 'Student ID', S.StudentName AS 'Student Name', M.Major AS 'Major' FROM Student S, Major M WHERE M.MajorId = S.MajorId;";
				$result = mysqli_query($db,$sql);
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						$studentid = $row['Student ID'];
						$studentname = $row['Student Name'];
						$major = $row['Major'];
				?>
				<tr class="info">
					<td><?=$studentid?></td>
					<td><?=$studentname?></td>
					<td><?=$major?></td>
				</tr>
				<?php
					}
				}
				mysqli_close($db);
				?>
			</tbody>
		</table></div>
	</div>
</body>
</html>
