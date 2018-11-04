<?php

include 'connection.php';
include 'view.php';
include 'function.php';


if (isset($_POST['btnsubmit'])) 
{
	if (!empty($_POST['username']) && !empty($_POST['email'])) 
	{
		$username= $_POST['username'];
		$email= $_POST['email'];

		//function
		insert($con,$username,$email);
	}else 
	{
		echo "Fill data first!";
	}

}

mysqli_close($con);

?>