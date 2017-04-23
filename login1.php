<?php

	require('connect.php');
	
?>

<DOCTYPE HTML>
<html>

<body>
<div>
<h1>Log into your account<h1>
<form name = "login" method="post" action ="login2.php">
<div>
<label>Username</label>
<input type="text" name ="username" id="username">
</div>
<div>
<label>Password</label>
<input type="password" name="password" id="password">
</div>
<button type="submit">Login</button>
</form>
</div>
</body>
</html>