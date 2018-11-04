<?php

include 'connection.php';
include 'function.php';

if (!empty($_POST['txtusername']) && !empty($_POST['txtpassword'])) 
    {
        $username= $_POST['txtusername'];
        $password= $_POST['txtpassword'];
        
        login($con,$username,$password);
    }
    
    // $session= session_start();
    
    // if ($session) 
    // {
    //     header('location: register.php');
    // }else 
    // {
    //     header('location: dashboard.php');
    // }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form method="post" align="center"></br>
    	<input type="text" name="txtusername" placeholder="Username" autofocus></br></br>
    	<input type="password" name="txtpassword" placeholder="Password"></br></br>
    	<input type="submit" name="btnlogin" value="Login">
    </form>
</body>
</html>