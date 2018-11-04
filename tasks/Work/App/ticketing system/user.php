<?php

//creat session & connect to DB
session_start();
include 'connect.php';

//to remove notice errors
error_reporting(~E_NOTICE);

//to check about user
if(!$_SESSION['class'] == 6) die('No user ID exists');

?>

<h2>User Lists</h2>

<a href="addticket.php">Add Ticket</a> | <a href="login.php?logout=logout">Logout</a> </br></br>

<form action ="user.php" method="POST">
    <input type="text" name="filter" placeholder="Enter Ticket no.">
    <input type="submit" name="search" value="Search"></br>
</form>


<table border="1" cellspacing="0" cellpadding="5px">

<th>ID</th>
<th>Member ID</th>
<th>Name</th>
<th>Phone</th>
<th>Subject</th>
<th>Descreption</th>
<th>Create Date</th>
<th>Status</th>
<!--<th>Action</th>-->
</tr>

<?php

//to search
if($_POST['search'] && $_POST['filter'] != ""){

    $sql="SELECT * FROM tickets INNER JOIN members ON tickets.member_id = members.member_id WHERE tickets.id = '".$_POST['filter']."'";
    $result=mysqli_query($con,$sql);

}


else{
    $sql="SELECT * FROM tickets INNER JOIN members ON tickets.member_id = members.member_id WHERE members.member_id ='{$_SESSION['member_id']}'";
    $result=mysqli_query($con,$sql);
}

//to get data from DB to table
if (mysqli_num_rows($result)>0) {
	while ($row=mysqli_fetch_assoc($result))
	{



?>
<tr>
  <td><?=$row['id']?></td>
	<td><?=$row['member_id']?></td>
  <td><?=$row['member_name']?></td>
	<td><?=$row['phone']?></td>
	<td><?=$row['subject']?></td>
	<td><?=$row['description']?></td>
	<td><?=$row['createdate']?></td>
	<td><label for="status"><?php echo $row['status']; ?></td>

</tr>
<?php
	}
    }

?>

</table>
