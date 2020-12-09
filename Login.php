<?php
//connecting to db
//finished
include('Connections.php');

$db = db_connect_hopper();
session_start();

if(isset($_POST["username"], $_POST["password"]))
{

   $username = $_POST["username"];
   $password = $_POST["password"];

   $sql = "SELECT sales_id, username FROM SalesAssociate WHERE username = '$username' AND  password = '$password'";
   $result = mysqli_query($db, $sql);
   $rows = mysqli_num_rows($result);
   if($rows > 0)
   {
      $row = $result->fetch_assoc();
      $_SESSION["login_user"] = true;
      $_SESSION["username"] = $row['username'];
      $_SESSION["user_id"] = $row['sales_id'];
      header("location: Welcome.php");
   }
   else
   {
      echo 'The username or password are incorrect!';
   }
}
?>
<html>

   <head>
      <title>Login Page</title>

      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:10%;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>

   </head>

   <body bgcolor = "#FFFFFF">

      <div align = "center">
         <div style = "width:30%; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

            <div style = "margin:3%">

               <form action = "" method = "post">
                  <label>Username  : </label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  : </label><input type = "Password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($error)) echo $error; ?></div>

            </div>

         </div>

      </div>

   </body>
</html>
