<div class="header">
            <h2>Delete an Associate</h2>
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

echo '<form action="DeleteAssociate.php" method="post">';
echo "<tr><th> Choose an Associate to Delete </th></tr><br>";
echo '<SELECT name="vis">';
foreach($conn->query($sql) as $row)
{
   echo '<option value ="';
   echo $row ["Name"];
   echo '">';
   echo $row ["Name"];
   echo '</option>';
}

echo '</select>';

echo '<br><br><input type="submit" name="submit">';
echo '</form>';

if(isset($_POST['vis']))
{

        $vis = ($_POST['vis']); echo $vis;
        $stmt = $conn->query("DELETE FROM Sales_Associate WHERE Name = '$vis'");
        echo "Database updated!";
}
?>

