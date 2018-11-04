<?php

//create connection
$con = mysqli_connect("localhost","root","","manage");

//check connection
if (!$con)
{
	die('Connection Failed: '.mysqli_connect_error($con));
}


?>
