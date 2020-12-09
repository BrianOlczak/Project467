<?php
//finished file
   include('Session.php');
   include('Config.php');
if(count($_POST)>0) {
mysqli_query($db,"UPDATE PurchaseOrder set order_id='" . $_POST['order_id'] . "', customer_id='" . $_POST['customer_id'] . "', item='" . $_POST['item'] . "', order_amt='" . $_POST['order_amt'] . "' ,discount='" . $_POST['discount'] . "',sales_id='" . $_POST['sales_id'] . "'
             ,comm_amt='" . $_POST['comm_amt'] . "',is_approved='" . $_POST['is_approved'] . "' ,secret_note='" . $_POST['secret_note'] . "' WHERE order_id='" . $_POST['order_id'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($db,"SELECT * FROM PurchaseOrder WHERE order_id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Order</title>
</head>
<body>

<div style="padding-bottom:5px;">
<a href="Orders.php">Order List</a>
</div>

<form name="frmUser" method="post" action="">
<div>
	<?php if(isset($message)) { echo $message; } ?>
</div>


<div>

Order ID:
<br>
<input type="hidden" name="order_id" class="txtField" value="<?php echo $row['order_id']; ?>">
<input type="text" name="order_id"  value="<?php echo $row['order_id']; ?>">
<br><br>

Customer ID:
<br>
<input type="text" name="customer_id" class="txtField" value="<?php echo $row['customer_id']; ?>">
<br><br>

Item:
<br>
<input type="text" name="item" class="txtField" value="<?php echo $row['item']; ?>">
<br><br>

Order Amt:
<br>
<input type="text" name="order_amt" class="txtField" value="<?php echo $row['order_amt']; ?>">
<br><br>

Discount:
<br>
<input type="text" name="discount" class="txtField" value="<?php echo $row['discount']; ?>">
<br><br>

Sales ID:
<br>
<input type="text" name="sales_id" class="txtField" value="<?php echo $row['sales_id']; ?>">
<br><br>

Commission Amt:
<br>
<input type="text" name="comm_amt" class="txtField" value="<?php echo $row['comm_amt']; ?>">
<br><br>

Is Approved:
<br>
<input type="text" name="is_approved" class="txtField" value="<?php echo $row['is_approved']; ?>">
<br><br>

Secret Note:
<br>
<input type="text" name="secret_note" class="txtField" value="<?php echo $row['secret_note']; ?>">
<br><br>
<input type="submit" name="submit" value="Submit" class="buttom">
<div>
</form>
</body>
</html>
