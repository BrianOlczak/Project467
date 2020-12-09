<html>
<head>
    <title>Manage Quotes</title>
</head>

<body>

<div class="header">
    <h2>Manage Quotes</h2>
</div>

<h4> Select the Quotes you want to Approve </h4>
<table border = 1>
    <th></th>
    <th>Quote ID</th>
    <th>Custormer ID</th>
    <th>Item</th>
    <th>Quantity</th>
    <th>Discount</th>
    <th>Commission Amt</th>
    <th>Is Approved</th>
    <th>Notes</th>

<?php
require 'HomeButton2.html';
require 'Session.php';
require 'Functions.php';

//Our select statement. This will retrieve the data that we want.
$salesId = $_SESSION['user_id'] ?? null;

$result = getOrders($salesId);

echo '<form action="ManageQuotes.php" method="post">';

$rows = mysqli_num_rows($result);
echo "<tbody>";

for ($i = 0; $i < $rows; $i++){
    $ar = mysqli_fetch_array($result);
    // var_dump($ar);
    // die();
    echo "<tr>";
        echo "<td><input type = 'radio' name = 'order_id' value = '" . $ar['order_id'] . "'> </td>";
        echo "<td>" . ($ar['order_id']) . "</td>";
        echo "<td>" . ($ar['customer_id']) . "</td>";
        echo "<td>" . ($ar['item']) . "</td>";
        echo "<td>" . ($ar['order_amt']) . "</td>";
        echo "<td>" . ($ar['discount']) . "</td>";
        echo "<td>" . ($ar['comm_amt']) . "</td>";
        echo "<td>" . ($ar['is_approved']) . "</td>";
        echo "<td>" . ($ar['secret_note']) . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

echo '<br><br><input type="submit" name="submit" value="Approve">';
echo '</form>';

if(isset($_POST['order_id']))
{
    $order_id = ($_POST['order_id']);
    
    $result = approve_order($order_id);

    if ($result) {
        echo "<br/><br/>";
        echo "Order Approved!!";
    }
}

?>

</body>
</html>