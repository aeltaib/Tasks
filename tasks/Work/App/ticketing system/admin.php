<?php

//creat session & connect to DB
session_start();
include 'connect.php';

//to remove notice errors
error_reporting(~E_NOTICE);

//to check about user
if(!$_SESSION['member_id'] == 1) die('No user ID exists');

        $sql = "UPDATE tickets SET assignto = '{$_POST['assignTo']}',status = '".$_POST['status']."' WHERE id = {$_POST['hidden_value']}";
        mysqli_query($con,$sql);

?>

<h2>Admin Lists</h2>
<a href="addticket.php">Add Ticket</a> | <a href="register.php">New User</a> | <a href="login.php?logout=logout">Logout</a></br></br>

<form action ="admin.php" method="POST">
    <input type="text" name="filter" placeholder="Enter Ticket no.">
    <input type="submit" name="search" value="Search"></br></br>
</form>


<table border="1" cellspacing="0" cellpadding="5px">
<th>ID</th>
<th>NAME</th>
<th>Phone</th>
<th>Subject</th>
<th>Descreption</th>
<th>Create Date</th>
<th>Assign To</th>
<th>Status</th>
<th>Action</th>

</tr>
<?php

//to search
if($_POST['search'] && $_POST['filter'] != ""){
    
    
    $result = mysqli_query($con,"UPDATE tickets SET assignto = '{$_POST['assignTo']},status = '{$_POST['status']}' WHERE id = '{$_POST['hidden_value']}'");
       
}


if(isset($_POST['search']) && isset($_POST['filter']) !="")
    {
    $sql="SELECT * FROM tickets INNER JOIN members ON tickets.member_id = members.member_id WHERE tickets.id = '".$_POST['filter']."'";
    $result=mysqli_query($con,$sql);
    
}

else{
    $sql="SELECT * FROM tickets INNER JOIN members ON tickets.member_id = members.member_id";
    $result=mysqli_query($con,$sql);
}
if (mysqli_num_rows($result)>0) {
	while ($row=mysqli_fetch_assoc($result)) 
	{

?>
<form action="admin.php" method="POST">
        <tr>
                <input type="hidden" name="hidden_value" value="<?php echo $row['id'];?>">
                <td><?=$row['id']?></td>
                <td><?=$row['member_name']?></td>
                <td><?=$row['phone']?></td>
                <td><?=$row['subject']?></td>
                <td><?=$row['description']?></td>
                <td><?=$row['createdate']?></td>

                <td>
                    <select name="assignTo">
                                    <option value="Helpdesk" <?php if($row['assignto'] == 'Helpdesk') echo 'selected'; ?>>Helpdesk</option>
                                    <option value="System Admin" <?php if($row['assignto'] == 'System Admin') echo 'selected'; ?>>System Admin</option>
                                    <option value="voice" <?php if($row['assignto'] == 'voice') echo 'selected'; ?>>Voice</option>
                                    <option value="noc" <?php if($row['assignto'] == 'noc') echo 'selected'; ?>>NOC</option>
                    </select>
                </td>

                <td>
                    <select name="status">
                                    <option value="open" <?php if($row['status'] == 'open') echo 'selected'; ?>>Open</option>
                                    <option value="resolved" <?php if($row['status'] == 'resolved') echo 'selected'; ?>>Resolved</option>
                                    <option value="closed" <?php if($row['status'] == 'closed') echo 'selected'; ?>>Close</option>
                    </select>
                </td>

                <td>
                    <input type="submit" name="update" value="submit">
                </td>



        </tr>
</form>
<?php
	}
	}	
?>
	
</table>