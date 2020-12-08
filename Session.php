<?php
//kkicks users to login if bad session
if (!isset($_SESSION)) {
	session_start();
}
if (empty($_SESSION['login_user'])) {
    header("Location: Login.php");
    exit("Sorry, the current session has expired.  Please log in again.");
}
?>
