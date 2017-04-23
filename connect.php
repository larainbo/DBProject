<?php
	function connect_db ()
	{
$username = "tdb005";
		$password = "yu1uv6Ey";
		$dbname = "tdb005";
		$servername = "localhost";
		$connection = new mysqli ($servername, $username, $password, $dbname);
		if ($connection->connect_error)
			die("Connection failed: " . $connection->connect_error);
		else
		{
			return $connection;
			echo 'Success';
			}
	}
?>