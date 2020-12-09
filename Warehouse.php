<html>
    <head>
        <title>Quotes Warehouse</title>
    </head>

    <body bgcolor="#f0f8ff">
        <form method="get" action="Welcome.php">
            <button type="submit">Home</button>
        </form>
        <div class="header">
            <h1></h1>
        </div>
    </body>

<h2> Select the approved Quote you want to alert the Customer about</h2>

<table border = 1>
    <th></th>
    <th>Quote ID</th>
    <th>Custormer ID</th>
    <th>Item</th>
    <th>Quantity</th>
    <th>Discount</th>
    <th>Commission Amt</th>
    <th>Is Approved</th>

<?php
require 'Session.php';
require 'Functions.php';

//Our select statement. This will retrieve the data that we want.
$salesId = $_SESSION['user_id'] ?? null;

$result = getOrders($salesId);

echo '<form action="Warehouse.php" method="post">';

$rows = mysqli_num_rows($result);
echo "<tbody>";

for ($i = 0; $i < $rows; $i++){
    $ar = mysqli_fetch_array($result);
    if ($ar['is_approved']) {
        echo "<tr>";
            echo "<td><input type = 'radio' name = 'order_id' value = '" . $ar['order_id'] . "'> </td>";
            echo "<td>" . ($ar['order_id']) . "</td>";
            echo "<td>" . ($ar['customer_id']) . "</td>";
            echo "<td>" . ($ar['item']) . "</td>";
            echo "<td>" . ($ar['order_amt']) . "</td>";
            echo "<td>" . ($ar['discount']) . "</td>";
            echo "<td>" . ($ar['comm_amt']) . "</td>";
            echo "<td>" . ($ar['is_approved']) . "</td>";
        echo "</tr>";
    }
}

echo "</tbody>";
echo "</table>";

echo '<br><br><input type="submit" name="submit" value="Alert">';
echo '</form>';

if(isset($_POST['order_id']))
{
    $orderId = ($_POST['order_id']);

    $order = getOrder($orderId);

    if (empty($order)) {
        die('Error: Unable to fetch Order details');
    }

    $custormer = getCustomer($order['customer_id']);
    if (empty($custormer)) {
        die('Error: Unable to fetch Custormer details');
    }

    echo "<br/><br/>";

    echo $custormer['name'] . " has been alerted for order approval.<br/>";
    echo $custormer['contact'];

    echo "<br><br>";

    $url = 'http://blitz.cs.niu.edu/PurchaseOrder/';
    $data = array(
        'order' => $order['order_id'], 
        'associate' => $order['sales_id'],
        'custid' => $order['customer_id'], 
        'amount' => $order['order_amt']);

    $options = array(
        'http' => array(
            'header' => array('Content-type: application/json', 'Accept: application/json'),
            'method'  => 'POST',
            'content' => json_encode($data)
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        echo "Unable to post order alert to blitz server.";
        die();
    }

    $result = json_decode($result);

    echo "<h4> API Response </h4>";
    if (isset($result->errors)) {
        foreach ($result->errors as $value) {
            echo $value . "<br>";
        }
    } else {
        foreach ($result as $key => $value) {
            echo $key . "\t:\t" . $value . "<br>";
        }
    }
}

?>

</body>
</html>