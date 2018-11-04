<?php

$localhost= "localhost";
$user= "root";
$pass= "";
$db= "dashboard";

$con= mysqli_connect($localhost,$user,$pass,$db);
mysqli_select_db($con,"dashboard");

if (!$con) 
{
    echo ("Connection Error!". mysqli_connect_error());
}

?>