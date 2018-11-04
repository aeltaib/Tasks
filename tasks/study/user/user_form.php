<?php

	//include 'function.php';
	include 'controller-1.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>View User</title>
</head>
<body>
 <form action="user_form.php">
	</br>
	<div>
	<table id="viewuser" width="30%" border="2" style="border-collapse: collapse;" align="center">
		<tr>
			<th align="center"><b>Username</th>
			<th align="center"><b>Email</th>
		</tr>
		<tr>
 			<?php

			select($con);						

			?>
		 </tr>
	</table>
	</div> 
</form>
</body>
</html>