<?php

    include 'Connections.php';

    function newQuote() {
        if (!$db = db_connect_blitz()) {
            echo "Connection Error: " .mysqli_error($db);
            return null;
        }
            
        $customerSQL = "Select * from customers;";
        $customerResult = mysqli_query($db, $customerSQL);

        return $customerResult;
    }

    function createNewOrder($orderArr) {
        
        if (!$db = db_connect_hopper()) {
            echo "Error: Unable to connect to the database.";
            return;
        }

        $customerID = $orderArr['customerID'];
        $item = $orderArr['item'];
        $price = $orderArr['price'];
        $discount = $orderArr['discount'];
        $salesId = $orderArr['salesId'];

        // TODO
        // Fetch Sales Comm_per using sales_id and calculate comm_amt
        $commAmt = 0;
        

        // TODO: Admin feature
        $isApproved = 0;
        // if ($orderArr[4] == "on") {
        //     $isApproved = 1;
        // }
        
        $notes = $orderArr['notes'];

        $query = "INSERT INTO PurchaseOrder (customer_id, item, order_amt, discount, sales_id, comm_amt, is_approved, secret_note) values ($customerID, '$item', $price, $discount, $salesId, $commAmt, $isApproved, '$notes')";

        if ($db->query($query)) {
            echo "Your Purchase Number is: ".mysqli_insert_id($db);
        }
        else {
            echo "Error:".mysqli_error($db);
        }

        mysqli_close($db);
    }

    function getOrders($salesId) {
        if (!$db = db_connect_hopper()) {
            echo "Error: Unable to connect to the database.";
            return null;
        }

        $query = "SELECT * FROM PurchaseOrder where sales_id = " . $salesId;        

        $result = $db->query($query);
        if (mysqli_num_rows($result) > 0)
            {
            Print "<table border>";
            Print "<tr>";
            Print "<th>ID</th><th>CustomerID</th><th>Item</th><th>Order Amount</th><th>Commision Amount</th><th>Approved</th><th>Note</th>";
            Print "<tr>";
            while($row = $result->fetch_assoc()) {
                Print "<tr>";
                Print "<td>".$row['order_id'] . "</td> ";
                Print "<td>".$row['customer_id'] . " </td>";
                Print "<td>".$row['item'] . " </td>";
                Print "<td>".$row['order_amt'] . " </td>";
                Print "<td>".$row['comm_amt'] . " </td>";
                Print "<td>".$row['is_approved'] . " </td>";
                Print "<td>".$row['secret_note'] . " </td></tr>";
            }
            Print "</table>";
        } else {
            echo "\n0 records found";
        }
    }

?>
