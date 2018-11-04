<?php

include 'connection.php';
include 'function.php';

if (isset($_POST['btndelete'])) 
{
	$username= $_POST['user'];

	delete($con,$username);
}	

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Delete User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>

    <form method="post" align="center"></br>
        
        <select name="user">
        	<option>Select Username</option>
        	<?php
        	
        	$get= select($con);
        	$count= count($get);
        	
        	$i= 0;
        	while ($i < $count) 
        	{
        		$username= $get[$i]['username'];

        		echo "<option>".$username."</option>";

        		$i++;
        	}
        	?>	
        </select></br></br>

        <input type="submit" name="btndelete" value="Delete">
	</form>

	<form action="index.php" align="center"></br>
    	<input type="submit" name="submit" value="Go Back">
    </form>

</body>
</html>