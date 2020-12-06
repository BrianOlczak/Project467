<div class="header">
            <h2>Edit Associates Information</h2>
        </div>
 <?php
include 'HomeButton.html';

$host = "courses";
$user = "z1808886";
$password = "1995Sep20";
$db = "z1808886";
$conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);

//Our select statement. This will retrieve the data that we want.
$sql = "SELECT Name FROM Sales_Associate";

echo '<form action="EditAssociate.php" method="post">';
echo "<tr><th> Choose an Associate to Edit </th></tr><br>";
echo '<SELECT name="sa">';
foreach($conn->query($sql) as $row)
{
   echo '<option value ="';
   echo $row ["Name"];
   echo '">';
   echo $row ["Name"];
   echo '</option>';

}
echo '</select>';

echo '<br><br>Commission: <br>';
echo '<input type="percent" name="CommissionAmt" id="CommissionAmt"<br>';

echo '<br>Address: <br>';
echo '<input type="address" name="Address" id="Address"<br>';

echo '<br>User Name: <br>';
echo '<input type="text" name="User_Name" id="User_Name"<br>';

echo '<br>Password: <br>';
echo '<input type="password" name="Password" id="Password"<br>';

echo '<br><br><input type="submit" name="sa" value="Add"><br>';
echo '</form>';

if(isset($_POST['sa']))
{
	$sa = ($_POST['sa']); echo $sa;
	$stmt = $conn->query("DELETE FROM Sales_Associate (CommissionAmt, Address, User_Name, Password) WHERE Name = '$sa'");
	$stmt = $conn->query("INSERT INTO Sales_Associate (CommissionAmt, Address, User_Name, Password) VALUES('$_POST[CommissionAmt]','$_POST[Address]','$_POST[User_Name]','$_POST[Password]') WHERE Name = '$sa'");
 	echo "Database updated!";
}


?>
