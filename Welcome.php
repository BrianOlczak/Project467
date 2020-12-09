<!DOCTYPE html>
<?php
include('Session.php');
?>
<html>
<!-- Adding align center styles to css -->
<style>
    h1 {
        text-align: center;
    }

    h3 {
        text-align: center;
    }

    form {
        text-align: center;
    }

    ul {
        text-align: center;
    }

    .column {
        float: left;
        width: 33.33%;
        padding: 5px;
    }

    .row::after {
        content: "";
        clear: both;
        display: table;
    }
</style>

<head>
    <title>Welcome</title>
</head>
<!-- headers go here -->
<body style="background-color:powderblue;">
<h1>Welcome <?php echo 'Sales Associate'; ?></h1>
<h3>We offer different plant services.</h3>
<!-- button lists -->
<ul>
    <li style="display:inline-block;">
        <form method="get" action="Customer_List.php">
            <button type="submit">Customer List</button>
        </form>
    </li>

    <li style="display:inline-block;">
        <form method="get" action="Orders.php">
            <button type="submit">Orders</button>
        </form>
    </li>

    <li style="display:inline-block;">
        <form method="get" action="CreateQuote.php">
            <button type="submit">Create Quote</button>
        </form>
    </li>
    <li style="display:inline-block;">
        <form method="get" action="Warehouse.php">
            <button type="submit">Warehouse</button>
        </form>
    </li>
    
    <li style="display:inline-block;">
        <form method="get" action="AdminHome.php">
            <button type="submit">Admin Interface</button>
        </form>
    </li>
    <li style="display:inline-block;">
        <form method="get" action="Logout.php">
            <button type="submit">Sign Out</button>
        </form>
    </li>
</ul>
<!-- pictures are here -->
<div class="row">
    <div class="column">
        <img src="Pineapple.jpg" alt="Pineapple"><br>
        <img src="Nuclear_Power.jpg" alt="Nuclear Power"><br>
        <img src="Tesla.jpg" alt="Elon Musk">
    </div>
    <div class="column">
        <img src="Manufacturing_Plant1.jpg" alt="Manufacturing Plant"><br>
        <img src="Manufacturing_Plant2.jpeg" alt="Manufacturing Plant"><br>
        <img src="Manufacturing_Plant3.png" alt="Manufacturing Plant">
    </div>
</div>
</body>

</html>
