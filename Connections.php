<?php

function db_connect_hopper() {
	$server = "courses";
	$user = "z1808886";
	$password = "1995Sep20";

	// For Local Testing
	// $server = "localhost";
	// $user = "root";
	// $password = "";

	$database = "z1808886";

	$db = new mysqli($server, $user, $password, $database);

	if($db->connect_error)
	{
		die("Connection to database failed: " . $db->connect_error);
    }

    return $db;
}

function db_close($identifier) {
    return $identifier->close();
}


function db_connect_blitz() {
	$server = "blitz.cs.niu.edu";
	$database = "csci467";
	$user = "student";
	$password = "student";

	$db = new mysqli($server, $user, $password, $database);

	if($db->connect_error)
	{
		die("Connection to database failed: " . $db->connect_error);
    }

    return $db;
}

?>
