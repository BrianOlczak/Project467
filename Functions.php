<?php

    include 'Connections.php';

    function getCustomerList() {
        if (!$db = db_connect_blitz()) {
            echo "Connection Error: " .mysqli_error($db);
            return null;
        }
            
        $customerSQL = "Select * from customers;";
        $customerResult = mysqli_query($db, $customerSQL);

        db_close($db);
        return $customerResult;
    }

    function getCustomer($id)
    {
        if (!$db = db_connect_blitz()) {
            echo "Connection Error: " .mysqli_error($db);
            return null;
        }
            
        $customerSQL = "Select * from customers where id = " . $id;
        $result = mysqli_query($db, $customerSQL);

        db_close($db);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
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

        db_close($db);
    }

    function getOrders($salesId) {
        if (!$db = db_connect_hopper()) {
            echo "Error: Unable to connect to the database.";
            return null;
        }

        $query = "SELECT * FROM PurchaseOrder where sales_id = " . $salesId; 

        $result = mysqli_query($db, $query);

        db_close($db);
        return $result;
    }

    function getOrder($orderId)
    {
        if (!$db = db_connect_hopper()) {
            echo "Connection Error: " .mysqli_error($db);
            return null;
        }
            
        $query = "SELECT * FROM PurchaseOrder where order_id = " . $orderId;
        
        $result = mysqli_query($db, $query);

        db_close($db);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }

    function approve_order($orderId)
    {
        if (!$db = db_connect_hopper()) {
            echo "Error: Unable to connect to the database.";
            return false;
        }

        $query = "UPDATE PurchaseOrder set is_approved = 1 where order_id = " . $orderId;

        $result = mysqli_query($db, $query);

        db_close($db);

        return true;
    }

?>
