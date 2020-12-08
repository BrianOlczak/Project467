<div class="header">
    <h2>Add New Associate </h2>
</div>

<?php
include 'HomeButton.html';

require 'Connections.php';
//connect to the Database
$conn = db_connect_hopper();

$conn->set_charset("utf8");

echo '<form action="AddAssociate.php" method="post">';

echo '<h4>Enter Associates Information</h4>';

echo 'Name: <br>';
echo '<input type="text" name="name" id="name"><br><br>';

echo 'Address: <br>';
echo '<input type="address" name="address" id="address"><br><br>';

echo 'Commission: <br>';
echo '<input type="percent" name="commissionPercent" id="commissionPercent"><br><br>';

echo 'User Name: <br>';
echo '<input type="text" name="username" id="username"><br><br>';

echo 'Password: <br>';
echo '<input type="password" name="password" id="password"><br><br>';

echo '<input type="submit" name="addAssociate" value="Add"><br>';
echo '</form>';

if(isset($_POST['addAssociate']))
{
	$stmt = $conn->query("INSERT INTO SalesAssociate (name, address, comm_per, username, password) VALUES('$_POST[name]','$_POST[address]','$_POST[commissionPercent]', '$_POST[username]','$_POST[password]')");
    
    echo 'Associate has been Added!';
}

db_close($conn);

?>
