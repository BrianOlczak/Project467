<div class="header">
            <h2>Add New Associate </h2>
        </div>

<?php
include 'HomeButton.html';

$host = "courses";
$user = "z1808886";
$password = "1995Sep20";
$db = "z1808886";

$conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);

echo '<form action="AddAssociate.php" method="post">';

echo 'Enter Associates Information<br>';

echo '<br>Name: <br>';
echo '<input type="text" name="Name" id="Name"<br>';

echo '<br>Commission: <br>';
echo '<input type="percent" name="CommissionAmt" id="CommissionAmt"<br>';

echo '<br>Address: <br>';
echo '<input type="address" name="Address" id="Address"<br>';

echo '<br>User Name: <br>';
echo '<input type="text" name="User_Name" id="User_Name"<br>';

echo '<br>Password: <br>';
echo '<input type="password" name="Password" id="Password"<br>';

echo '<br><br><input type="submit" name="addAssociate" value="Add"><br>';
echo '</form>';

if(isset($_POST['addAssociate']))
{
  $stmt = $conn->query("INSERT INTO Sales_Associate (Name, CommissionAmt, Address, User_Name, Password) VALUES('$_POST[Name]','$_POST[CommissionAmt]','$_POST[Address]','$_POST[User_Name]','$_POST[Password]')");
        echo 'Associate has been entered!';
}

?>
