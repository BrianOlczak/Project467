<?php session_start(); ?>
<?php
   include('session.php');
?>
<html>
<head>
<title>Legacy Database Access</title>
<h3>Customer database</h3>
<a href="welcome.php">main page</a>
<?php
  $servername = 'blitz.cs.niu.edu';
  $username='student';
  $password='student';
  $dbname = 'csci467';

//connect to the Database
  $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error)
    {
      die("Connection to database failed: " . $conn->connect_error);
    }
  echo 'Connection Successful: ' . $servername;
  $conn->set_charset("utf8");
  $sql = 'SELECT * FROM customers';
  $result = $conn->query($sql);
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
$conn->close();
?>
</body>
</html>