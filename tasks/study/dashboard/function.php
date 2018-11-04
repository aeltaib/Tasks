<?php

function register($con,$name,$username,$email,$password)
{
 
        $sql= "INSERT INTO dashboard (name,username,email,password) VALUES ('$name','$username','$email','$password')";

        if (mysqli_query($con,$sql)) 
        {
            echo "Registered.";
        }else 
        {
            echo "Not Done!";
        }
}


function login($con,$username,$password)
{
    $sql= "SELECT username,password FROM dashboard WHERE username= '$username' and password= '$password'";
    $result= mysqli_query($con,$sql);
    
    if (mysqli_num_rows($result)> 0) 
    {
        while ($row= mysqli_fetch_assoc($result)) 
        {
            if (isset($_POST['txtusername'])==true && isset($_POST['txtpassword'])==true) 
            {
                header('location: dashboard.php');
            }else 
            {
                header('location: register.php');;
            }
        }
    }    
}

?>