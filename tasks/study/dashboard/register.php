<?php

include 'connection.php';
include 'function.php';


   if (!empty($_POST['txtname']) && !empty($_POST['txtusername']) && !empty($_POST['txtemail']) && !empty($_POST['txtpassword']) && !empty($_POST['txtconfirm'])) 
    {
        $name= $_POST['txtname'];
        $username= $_POST['txtusername'];
        $email= $_POST['txtemail'];
        $password= $_POST['txtpassword'];

        register($con,$name,$username,$email,$password);
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form method="post" align="center"></br>
        <input type="text" name="txtname" placeholder="Full Name" autofocus></br></br>
    	<input type="text" name="txtusername" placeholder="Username"></br></br>
    	<input type="text" name="txtemail" placeholder="Email"></br></br>
    	<input type="password" name="txtpassword" placeholder="Password"></br></br>
    	<input type="password" name="txtconfirm" placeholder="Confirm Password"></br></br>
    	<input type="submit" name="btnreg" value="Register"></br></br>
        </form>
        
        <form align="center" action="login.php">
        <input type="submit" name="btlog" value="Login">
        </form>
</body>
</html>