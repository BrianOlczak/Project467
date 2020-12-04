<?php

function db_connect_hopper() {
	$server = "courses";
	$port = "3306";
	$database = "z1808886";
	$user = "z1808886";
	$password = "1995Sep20";

	$db = mysqli_connect($server, $user, $password, $database, $port);

	if($db->connect_error)
	{
		die("Connection to database failed: " . $db->connect_error);
    }

    return $db;
}

function db_close($identifier) {
    return $db->close();
}


function db_connect_blitz() {
	$server = "blitz.cs.niu.edu";
	$port = "3306";
	$database = "csci467";
	$user = "student";
	$password = "student";

	$db2 = mysqli_connect($server, $user, $password, $database, $port);

	if($db2->connect_error)
	{
		die("Connection to database failed: " . $db->connect_error);
    }

    return $db2;
}

?>
