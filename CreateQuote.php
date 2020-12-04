//Brian Olczak
// Group 8B

<!DOCTYPE HTML>
<html>
    <head>
        <title>Customer Quote</title>
        <h1>Customer Quote</h1>
        <style>
            div {       //TODO change this
                border: 1px solid black;
                width: 650px;
                height: 650px;
                overflow: auto;
            }
        </style>
    </head>
     <form method="get" action="Welcome.php">
        <button type="submit">Home</button>
   
    
    <body bgcolor="#f8f8ff">
        
        <?php
        //include 'Connections.php';
        include 'Functions.php';
        include 'Session.php';
        //session_start();
        newQuote();
        $order = array(
            'customerID'    =>  $_POST['CustomerID'],
            'item'          =>  $_POST['Item'],
            'price'         =>  $_POST['OrderAmount'],
            'discount'      =>  $_POST['Discount'],
            'salesId'       =>  1,      // TODO: fetch this sales_associate id from session
            'notes'         =>  $_POST['Secret_Note']
        );
        createNewOrder($order);

        function newQuote() {
            if ($customerConnection = mysqli_connect('blitz.cs.niu.edu', 'student', 'student', 'csci467', '3306')) {
                $customerSQL = "Select * from customers;";
                $customerResult = mysqli_query($customerConnection, $customerSQL);

                if (mysqli_connect_errno()) {
                    echo "Connection Error: ".mysqli_error($customerConnection);
                }
                else {
                    echo "<form method = 'post' action = 'CreateQuote.php'>";
        ?>

        </br>
            Customer info
        <div>
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
                            echo "<td><input type = 'radio' name = 'CustomerID' value = ", ($ar[0]), "</td>";
                            echo "<td>",($ar[0]),"</td>";
                            echo "<td>",($ar[1]),"</td>";
                            echo "<td>",($ar[2]),"</td>";
                            echo "<td>",($ar[3]),"</td>";
                            echo "<td>",($ar[4]),"</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                ?>

            </table>
        </div>

        <?php
            echo "<table>";
                echo "<tr>";
                    echo "<td>Items: </td>";
                    echo "<td><input type = 'text' name = 'Item'></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>Note: </td>";
                    echo "<td><input type = 'text' name = 'Secret_Note'></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>Price: </td>";
                    echo "<td><input type = 'text' name = 'OrderAmount'></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>Discounts: </td>";
                    echo "<td><input type = 'text' name = 'Discount'></td>";
                echo "</tr>";
            echo "</table>";

            echo "<input type = 'submit' name = 'createNewSubmit' value = 'Submit'>";
            echo "</form>";

                }
            }
            elseif(mysqli_connect_errno()) {
                echo "Connection error:". mysqli_connect_error();
            }
           db2_close($customerConnection);
        }
        ?>
    </body>
</html>
