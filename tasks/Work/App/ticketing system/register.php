<?php

//to remove notice errors
error_reporting(~E_NOTICE);

//connect to DB (from connect page)
include 'connect.php';

//if connection wrong 
if(!mysqli_select_db($con,'manage'))
{
    echo 'Database Not Selected.';
}


$member_name = $_POST['member_name'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$class = $_POST['class'];

$sql= "INSERT INTO members (member_name,password,phone,class) VALUES ('$member_name','$password','$phone','$class')";

//if the query wrong
if (!mysqli_query($con,$sql))
{
    echo 'Not Registered.';
    
} else {
    
    echo 'Registered.';
    
} 
    

?>

<!DOCTYPE html>
<html>
<head>
    <title>New User</title>
</head>
<body id="body-color"><br>
    <div id="new-user"></div>
    <fieldset style="width: 20%"><legend>New User</legend>
        <table table="0"></table>
        </br>
        <tr>
        <form method= "POST" action= "register.php">
            
            <td><input type="text" name="member_name" placeholder="Name" required autofocus></td>
        </tr></br></br>
        
        <tr>
            <td><input type="password" name="password" placeholder="Password" required></td>
        </tr></br></br>
        
        <tr>
            <td><input type="tel" name="phone" placeholder="Phone" required></td>
        </tr></br></br>
        
        <tr>
            <td><input type="text" name="class" placeholder="Position or Title" required></td>
        </tr></br></br>
        
        <tr>
            <td><input type="submit" id="button" name="submit" value="Insert User"></td>
        </tr>&emsp;&emsp;&emsp;&emsp;
        
        <a href="admin.php">Go Back</a>
        </form>
        
    </fieldset>
</body>
</html>