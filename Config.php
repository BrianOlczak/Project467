<?php
//do not change this
	$servername = 'courses';
	$username='z1808886';
	$password='1995Sep20';
	$dbname = 'z1808886';

	//connect to the Database
	$db = new mysqli($servername, $username, $password, $dbname);
	if($db->connect_error)
	{
		die("Connection to database failed: " . $db->connect_error);
	}
?>
