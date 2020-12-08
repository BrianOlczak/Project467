<div class="header">
    <h2>Delete an Associate</h2>
</div>

<?php
include 'HomeButton.html';

require 'Connections.php';
//connect to the Database
$conn = db_connect_hopper();

$conn->set_charset("utf8");

//Our select statement. This will retrieve the data that we want.
$sql = "SELECT sales_id, name FROM SalesAssociate";

echo '<form action="DeleteAssociate.php" method="post">';
echo "<tr><th> Choose an Associate to Delete </th></tr><br>";
echo '<SELECT name="vis">';
foreach($conn->query($sql) as $row)
{
   echo '<option value ="';
   echo $row['sales_id'];
   echo '">';
   echo $row['name'];
   echo '</option>';
}

echo '</select>';

echo '<br><br><input type="submit" name="submit">';
echo '</form>';

if(isset($_POST['vis']))
{

        $vis = ($_POST['vis']); 
        // echo $vis;
        $stmt = $conn->query("DELETE FROM SalesAssociate WHERE sales_id = $vis");
        echo "Database updated!";
}

db_close($conn);
?>

