<?php
function connect_db()
{
$servername = "localhost";
$username = "larainbo";
$password = "pNuch6uy8";
$dbname = "larainbo";

	$connection = new mysqli ($servername, $username, $password, $dbname);
		if ($connection->connect_error)
			die("Connection failed: " . $connection->connect_error);
		else
			return $connection;
			}
?>

