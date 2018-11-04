<?php

$localhost= "localhost";
$user= "root";
$pass= "";
$db= "user";


$con= mysqli_connect($localhost,$user,$pass,$db);
mysqli_select_db($con,"user");


if (!$con) 
{
	die("Connection Error!". mysqli_connect_error());
}

?>