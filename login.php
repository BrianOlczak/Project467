<?php
//connecting to db
   include('Config.php');
   session_start();
 $error = 'all set';
 if(isset($_POST["username"], $_POST["password"]))
     {

         $Username = $_POST["username"];
         $Password = $_POST["password"];

         $sql = "SELECT User_Name FROM Sales_Associate WHERE User_Name = '$Username' AND  Password = '$Password'";
         $result1 = mysqli_query($db,$sql);
         $rows = mysqli_num_rows($result1);
         if($rows > 0)
         {
             $_SESSION["login_user"] = true;
             $_SESSION["login_user"] = $Username;
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
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>

   </head>

   <body bgcolor = "#FFFFFF">

      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

            <div style = "margin:30px">

               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "Password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

            </div>

         </div>

      </div>

   </body>
</html>