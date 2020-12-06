<div class="header">
            <h2>List of Associates</h2>
        </div>
<?php

include 'HomeButton.html';

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
        return "<br><td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
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
    $stmt = $conn->prepare("SELECT * From  Sales_Associate");
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
?>
