<?php
/*
require_once('auth.php');

session_start();
if(empty($_SESSION['authenticated']) || $_SESSION['authenticated'] !='true'){
    header('Location: login.php');

}
*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ticketing System</title>
</head>
<body>
<h1><u><center>Welcome to Ticketing System, Please choose: </br></br></center></u></h1>

<form>
<center><a href="login.php" ><h2>Admin</h2></a></center>
<center><a href="login.php" ><h2>Technician</h2></a></center>
<center><a href="login.php" ><h2>User</h2></a></center></br></br>
</form>

<center>
<footer id="footer">
<details>
	<summary>Copyright 2017</summary>
	<p>Ahmed Eltaib. All rights reserved.</p>
</details>

</footer>
</center>

</body>
</html>
