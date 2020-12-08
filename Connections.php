<?php

function db_connect_hopper() {
	$server = "hopper.cs.niu.edu";
	$user = "z1808886";
	$password = "1995Sep20";

	// For Local Testing
	// $server = "localhost";
	// $user = "root";
	// $password = "";

	$database = "z1808886";
	$port = "3306";

	$db = mysqli_connect($server, $user, $password, $database, $port);

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
	$port = "3306";
	$database = "csci467";
	$user = "student";
	$password = "student";

	$db = mysqli_connect($server, $user, $password, $database, $port);

	if($db->connect_error)
	{
		die("Connection to database failed: " . $db->connect_error);
    }

    return $db;
}

// function db2_close($identifier) {
//     return $db2->close();
// }

?>
