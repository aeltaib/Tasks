<?php

function insert($con,$username,$email)
{
	$sql= "INSERT INTO user (username, email) VALUES ('$username','$email')";
	
	if (mysqli_query($con,$sql)) 
	{
		echo "Data Inserted.";
	}else
	{
		echo "Not Done!";
	}

		header ("refresh:3; url= index.php");
}


function select($con)
{
	$sql= "SELECT * FROM user";
	$result= mysqli_query($con,$sql);
    $all = array();

	if (mysqli_num_rows($result)>0) 
	{
		while ($row= mysqli_fetch_assoc($result)) 
		{
			 $all[]= $row;
		}
		
		return $all;
	}
}


function update($con,$username,$coulm,$value)
{
	$sql= "UPDATE user SET $coulm= '$value'  WHERE username= '$username'";
	$result= mysqli_query($con,$sql);
	
	if (!mysqli_query($con,$result)) 
	{
		echo "1 Row affected.";
	}else 
	{
		echo "Not Done!";
	}

}


function delete($con,$username)
{
	$sql= "DELETE FROM user WHERE username= '$username'";
	$result= mysqli_query($con,$sql);

	if (!mysqli_query($con,$result)) 
	{
		echo "1 Row affected.";
	}else 
	{
		echo "Not Done!";
	}
}

?>