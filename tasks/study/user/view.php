<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User's Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>

    <form method="post" action="index.php" align="center"></br>
    	<input type="text" name="username" placeholder="Username" autofocus></br></br>
    	<input type="text" name="email" placeholder="Email"></br></br>
    	<input type="submit" name="btnsubmit" value="Save">&nbsp;&nbsp;
     	<!-- <input type="submit" name="btndelete" value="Delete"> -->
    </form>
</br>
    <form method="post" action="edit.php" align="center">
    	<input type="submit" name="btnedit" value="Edit">
    </form>
</br>
    <form method="post" action="controller-1.php" align="center">
    	<input type="submit" name="btnview" value="View User">
    </form>
</br>
    <form method="post" action="delete.php" align="center">
    	<input type="submit" name="btndel" value="Delete">
    </form>

</body>
</html>