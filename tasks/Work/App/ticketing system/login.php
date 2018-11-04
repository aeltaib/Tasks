<?php



/*
if(!empty($_POST['user']) && !empty($_POST['pass'])):

	$records = $conn->prepare('SELECT username,password FROM tickets WHERE username = "username"');
	$records->bindParam('username', $_POST['user']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';

	if(count($results) > 0 && password_verify($_POST['pass'], $results['password']) ){

		$_SESSION['username'] = $results['username'];
		header("Location: /login.php");

	} else {
		$message = 'Sorry, those credentials do not match';
	}

endif;
*/

session_start();

if(isset($_POST['btnLogin']))
{
        require 'connect.php';

        //check the data entered from user
	$member_name = $_POST['member_name'];
	$password = $_POST['password'];
        $result = mysqli_query($con,"SELECT * FROM members WHERE member_name = '{$member_name}' and password = '{$password}'");
        $result_fetch = mysqli_fetch_assoc($result);
        
        //if data correct forward to correct page
	if(mysqli_num_rows($result))
	{
		$_SESSION['member_name'] = $member_name;
                $_SESSION['member_id'] = $result_fetch['member_id'];
                $_SESSION['class'] = $result_fetch['class'];
                
                if($_SESSION['class'] == 1) header('Location: admin.php');
                elseif($_SESSION['class'] == 6) header('Location: user.php');
                else header('Location: tech.php');

	}
        
        else {echo "Account not valid.";}
}

//destroy/end the session
if(isset($_GET['logout']))
{
        session_destroy();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<center>
<h1>Login</h1>

<form action="login.php" method="POST">

	<input type="text" name="member_name" placeholder="member_name" autofocus required></br></br>
	<input type="password" name="password" placeholder="Password" autofocus required></br></br>
	<input type="submit" name="btnLogin" value="Login">

</form>
</center>
</body>
</html>
