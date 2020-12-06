<?php session_start(); ?>
<?php
   include('Session.php');
   include('Config.php');
?>
<html>
<head>
<title>Orders Database</title>
<h3>Orders Database</h3>
<a href="Welcome.php">main page</a>
<?php
  $db->set_charset("utf8");
  $sql = 'SELECT * FROM PurchaseOrder';
  $result = $db->query($sql);
  if ($result->num_rows > 0)
  {
    Print "<table border>";
    Print "<tr>";
    Print "<th>ID</th><th>Customer ID</th><th>Item</th><th>Order Ammount</th><th>Discount</th><th>Sales ID</th><th>Commision</th><th>Approved</th><th>Note</th>";
    Print "<tr>";
    while($row = $result->fetch_assoc()) {
   Print "<tr>";
   Print "<td>".$row['order_id'] . "</td> ";
   Print "<td>".$row['customer_id'] . " </td>";
   Print "<td>".$row['item'] . " </td>";
   Print "<td>".$row['order_amt'] . " </td>";
   Print "<td>".$row['discount'] . " </td>";
   Print "<td>".$row['sales_id'] . " </td>";
   Print "<td>".$row['comm_amt'] . " </td>";
   Print "<td>".$row['is_approved'] . " </td>";
   Print "<td>".$row['secret_note'] . " </td></tr>";
 }
Print "</table>";
} else {
Print "0 records found";
  }
$db->close();
?>
</body>
</html>
