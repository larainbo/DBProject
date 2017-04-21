<?php
	require('controller.php');
	
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
	
	<!-- NAVBAR -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
		<a class="navbar-brand" href="index.php">DBMS Project</a>
		<a class="navbar-brand" href="createAccount.php" style="float:right">Create Account</a>
		<a class="navbar-brand" href="login.php" style="float: right">Login</a>
		</div>
	</nav>
</head>

<body style="background-image:url(bg.png); background-size:cover; background-repeat:no-repeat; background-position:center center">
	<div class="container">
		<h2>Create an Account</h2>
		<form method="post" action="createAccount_action.php">
			<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" id="username" class="form-control" required>
			</div>
			<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" id="password" class="form-control" required>
			</div>
			<button type="submit" class="btn btn-info">Create!</button>
		</form>
	</div>
</body>
</html>