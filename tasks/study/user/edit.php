<?php

include 'connection.php';
include 'function.php';

			if (isset($_POST['submit'])) 
			{
				 $username= $_POST['user'];
				 $colum= $_POST['select'];
				 $value= $_POST['txtedit'];
				
				if (!empty($_POST['txtedit']) && ($_POST['select'] !='Select Option')) 
				{	//echo "string";
					$username= update($con,$username,$colum,$value);
					
				}
			}
		
			
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit User</title>
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

        <select name="select">
        	<option>Select Option</option>
        	<option>Username</option>
        	<option>Email</option>

        </select></br></br>

        <input type="text" name="txtedit" placeholder="Enter a value"></br></br>
        <input type="submit" name="submit" value="Edit"></br></br>
    </form>

    <form action="index.php" align="center">
    	<input type="submit" name="submit" value="Go Back">
    </form>
</body>
</html>