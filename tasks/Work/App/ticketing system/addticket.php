<?php

session_start();    //open session
include 'connect.php';  //connect to DB

//to show/insert the ticket 
if (isset($_POST['btnsubmit'])) {
	$sql= "INSERT INTO tickets(member_id,subject,description,status) VALUES 
	('".$_SESSION['member_id']."','".$_POST['subject']."','".$_POST['description']."','open')";

        //check who will login
	if (mysqli_query($con,$sql)) {
		if($_SESSION['class'] == 1) header('Location: admin.php');
                elseif($_SESSION['class'] == 6) header('Location: user.php');
                else header('Location: tech.php');
	}else
	{
		echo "Error".mysqli_error($con);
	}
}

?>

<h2>Add Ticket</h2>

<form action="addticket.php" method="post">
<table>
	

                <tr>
                    <td>Subject:</td>
                    <td><input name="subject" autofocus></td>
		</tr>
		<tr>
                    <td>Descreption:</td>
                    <td><input name="description"></td>
		</tr>
		
		<tr>
                    <td><input type="submit" name="btnsubmit" value="Add Ticket"></td>
                </tr>
</table>
	
</form>