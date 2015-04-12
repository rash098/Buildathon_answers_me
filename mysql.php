<?php
	$host="localhost"; // Host name
	$username="root"; // Mysql username
	$password=""; // Mysql password
	$db_name="answerme"; // Database name

	// Connect to server and select database.
	$mysqli = new mysqli("$host", "$username", "$password", "$db_name") or die("cannot connect server ");
?>