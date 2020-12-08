<html>
    <head>
        <h1>New Quotes</h1>
    </head>

    <body bgcolor="#f0f8ff"></body>
</html>

<?php
    include('Functions.php');
    viewRecievedQuote();

    function viewRecievedQuote() {
        $connection = dbConnect();
        echo "<table border = 1>";
        echo "Select a Quote to work with:";
        echo "<thead>";
        echo "<th></th>";
        echo "<th>ID</th>";
        echo "<th>Items</th>";
        echo "<th>Note</th>";
        echo "<th>Price</th>";
        echo "<th>Discounts</th>";
        echo "<th>approved</th>";
        echo "</thead>";
        echo "<tbody>";
        $sql = "Select * from PurchaseOrder;";

        if ($result = mysqli_query($connection, $sql)) {
            $rowNum = mysqli_num_rows($result);

            for ($i = 0; $i < $rowNum; $i++) {
                $array = mysqli_fetch_array($result);
                echo "<tr>";
                echo "<td><input type = 'radio' name = 'select' value = ", ($array[0]),"></td>";
                echo "<td>",($array[0]),"</td>";
                echo "<td>",($array[1]),"</td>";
                echo "<td>",($array[2]),"</td>";
                echo "<td>",($array[3]),"</td>";
                echo "<td>",($array[4]),"</td>";
                if ($array[5] >= 1) {
                    echo "<td>Yes</td>";
                }
                else {
                    echo "<td>No</td>";
                }
                echo "</tr>";
            }
        }
        else {
            echo "Failed to execute: " . mysqli_error($connection);
        }
        echo "</tbody>";
        echo "</table>";
        echo "<table>";
        echo "<tr>";
        echo "<td>";
        echo "</td>";
        echo "<td>";
        echo "<button type = 'submit' name = 'EmailQuote' formaction = 'EmailQuote.php'>Email Quote</button>";
        echo "</td>";
        echo "</tr>";
        echo "</table>";
        echo "</form>";
    }
?>


