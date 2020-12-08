<div class="header">
        <h2>Edit Associates Information</h2>
</div>

<?php
include 'HomeButton.html';

require 'Connections.php';
//connect to the Database
$conn = db_connect_hopper();

$conn->set_charset("utf8");

//Our select statement. This will retrieve the data that we want.
$sql = "SELECT sales_id, name FROM SalesAssociate";

echo '<form action="EditAssociate.php" method="post">';
echo "<tr><th> Choose an Associate to Edit </th></tr><br>";
echo '<SELECT name="sa">';
foreach($conn->query($sql) as $row)
{
    echo '<option value ="';
    echo $row['sales_id'];
    echo '">';
    echo $row['name'];
    echo '</option>';

}
echo '</select><br><br>';

echo 'Address: <br>';
echo '<input type="address" name="address" id="address"><br><br>';

echo 'Commission: <br>';
echo '<input type="percent" name="commissionPercent" id="commissionPercent"><br><br>';

echo 'User Name: <br>';
echo '<input type="text" name="username" id="username"><br><br>';

echo 'Password: <br>';
echo '<input type="password" name="password" id="password"><br><br>';

echo '<input type="submit" value="Update"><br>';
echo '</form>';

if(isset($_POST['sa']))
{
    $sa = (int)$_POST['sa'];

    

    if (empty($_POST['address']) || empty($_POST['commissionPercent']) || 
                empty($_POST['username']) || empty($_POST['password'])) {
        echo "Error: All Fields are necessary";
    } else {
        
        $query = 'UPDATE SalesAssociate SET address = "' . $_POST['address'] . '", comm_per = "' .  $_POST['commissionPercent'] . '", username = "' . $_POST['username'] . '", password = "' . $_POST['password'] . '" WHERE sales_id = ' . $sa;

        $stmt = $conn->query($query);

        echo "Database updated!";
    }
}

db_close($conn);

?>
