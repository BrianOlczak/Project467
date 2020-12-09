<?php
   include('Session.php');
?>
<html>
<head>
    <title>List Of CCustomers</title>
</head>
    <body>
        <form method="get" action="Welcome.php">
            <button type="submit">Home</button>
        </form>

    <h3>Customer database</h3>

    <?php
        require 'Functions.php';
        
        $result = getCustomerList();

        if ($result->num_rows > 0)
            {
            Print "<table border>";
            Print "<tr>";
            Print "<th>ID</th><th>Name</th><th>City</th><th>Street</th><th>Contact</th>";
            Print "<tr>";
            while($row = $result->fetch_assoc()) {
                Print "<tr>";
                Print "<td>".$row['id'] . "</td> ";
                Print "<td>".$row['name'] . " </td>";
                Print "<td>".$row['city'] . " </td>";
                Print "<td>".$row['street'] . " </td>";
                Print "<td>".$row['contact'] . " </td></tr>";
            }
            Print "</table>";
        } else {
            Print "0 records found";
        }
    ?>

    </body>
</html>
