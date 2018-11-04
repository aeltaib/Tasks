<?php

$localhost= "localhost";
$user= "root";
$password= "";
$db= "electrolux";

$con= mysqli_connect($localhost,$user,$password,$db);
mysqli_connect_db($con,"electrolux");

if(!$con)
{
    die("Connection Error!:". mysqli_connect_error());
}

?>