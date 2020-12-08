<!DOCTYPE HTML>
<html>
    <head>
        <title>Customer Quote</title>    
        <style>
            div {       
                <!-- TODO:; change this-->
                border: 1px solid black;
                width: 650px;
                height: 650px;
                overflow: auto;
            }
        </style>
    </head>
   
    
    <body bgcolor="#f8f8ff">
        <form method="get" action="Welcome.php">
            <button type="submit">Home</button>
        </form>

        <h1>Customer Quote</h1>
        
        <?php
        //include 'Connections.php';
        include 'Functions.php';
        include 'Session.php';
        //session_start();
        newQuote();
        if (isset($_POST['CustomerID'])) {
            $order = array(
                'customerID'    =>  $_POST['CustomerID'] ?? null,
                'item'          =>  $_POST['Item'] ?? null,
                'price'         =>  $_POST['OrderAmount'] ?? null,
                'discount'      =>  $_POST['Discount'] ?? null,
                'salesId'       =>  $_SESSION['user_id'] ?? null,
                'notes'         =>  $_POST['SecretNote'] ?? null
            );
            createNewOrder($order);
        }

        $customerResult = newQuote();
        
        ?>

        <form method = 'post' action = 'CreateQuote.php'>
            
        <div>
            Select Customer
            <table border = 1>
                <th></th>
                <th>ID</th>
                <th>Name</th>
                <th>City</th>
                <th>Street</th>
                <th>Contact</th>

                <?php
                    $rows = mysqli_num_rows($customerResult);
                    echo "<tbody>";

                    for ($i = 0; $i < $rows; $i++){
                        $ar = mysqli_fetch_array($customerResult);
                        echo "<tr>";
                            echo "<td><input type = 'radio' name = 'CustomerID' value = '" . $ar[0] . "'> </td>";
                            echo "<td>" . ($ar[0]) . "</td>";
                            echo "<td>" . ($ar[1]) . "</td>";
                            echo "<td>" . ($ar[2]) . "</td>";
                            echo "<td>" . ($ar[3]) . "</td>";
                            echo "<td>" . ($ar[4]) . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                ?>

            </table>
        </div>
            <table>
                <tr>
                    <td>Items: </td>
                    <td><input type = 'text' name = 'Item'></td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td><input type = 'text' name = 'OrderAmount'></td>
                </tr>
                <tr>
                    <td>Discounts: </td>
                    <td><input type = 'text' name = 'Discount'></td>
                </tr>
                <tr>
                    <td>Note: </td>
                    <td><input type = 'text' name = 'SecretNote'></td>
                </tr>
            </table>

            <input type = 'submit' name = 'createNewSubmit' value = 'Submit'>
        </form>
    </body>
</html>
