<div class="header">
    <h2>List of Associates</h2>
</div>

<?php

include 'HomeButton.html';


echo "<table style='border: solid 1px black; margin-top: 2%'>";
echo "<tr><th>ID</th><th>Name</th><th>Address</th><th>Commission</th><th>UserName</th><th>Password</th></tr>";
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

require 'Connections.php';
//connect to the Database
$conn = db_connect_hopper();

$conn->set_charset("utf8");

$sql = 'SELECT * FROM SalesAssociate';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    foreach(new TableRows(new RecursiveArrayIterator(mysqli_fetch_all($result))) as $k=>$v)
    {
        echo $v;
    }
}

echo "</table>";

db_close($conn);

?>
