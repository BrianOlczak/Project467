<div class="header">
    <h2>Manage Quotes</h2>
</div>

<?php
include 'HomeButton2.html';

require 'Connections.php';
//connect to the Database
$conn = db_connect_hopper();

$conn->set_charset("utf8");

//Our select statement. This will retrieve the data that we want.
$sql = "SELECT order_id, is_approved, item FROM PurchaseOrder";

echo '<form action="DeleteAssociate.php" method="post">';
echo "<tr><th> Select Status of Quotes you wish to view </th></tr><br>";
echo '<SELECT name="vis">';

foreach($conn->query($sql) as $row)
{
   echo '<option value ="';
   echo $row["order_id"];
   echo '">';
   echo $row["item"] . "(" . $row['is_approved'] . ")";
   echo '</option>';
}

echo '</select>';

echo '<br><br><input type="submit" name="submit">';
echo '</form>';

if(isset($_POST['vis']))
{

    $vis = ($_POST['vis']);

	echo "<table style='border: solid 1px black;'>";
	echo "<tr><th>Name</th><th>Commission</th><th>Address</th><th>UserName</th><th>Password</th></tr>";
	class TableRows extends RecursiveIteratorIterator
	{
    	function __construct($it)
    	{
        	parent::__construct($it, self::LEAVES_ONLY);
    	}

    	function current()
    	{
        	return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    	}

    	function beginChildren()
    	{
        	echo "<tr>";
    	}

    	function endChildren()
    	{
        	echo "</tr>" . "\n";
    	}
}

	$host = "courses";
	$user = "z1808886";
	$password = "1995Sep20";
	$db = "z1808886";

	try
	{
	   $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$stmt = $conn->prepare("SELECT FROM PurchaseOrder WHERE Status = '$vis'");
    	$stmt->execute();
 	// set the resulting array to associative
    	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    	foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v)
    	{
        echo $v;
    	}
}
	catch(PDOException $e)
	{
    	echo "Error: " . $e->getMessage();
	}
	$conn = null;
	echo "</table>";

}

?>
