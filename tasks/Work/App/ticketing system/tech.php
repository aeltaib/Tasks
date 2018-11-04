<?php

//creat session & connect to DB
session_start();
include 'connect.php';

?>

<h2>Technician Lists</h2>
<a href="addticket.php">Add Ticket</a> | <a href="login.php?logout=logout">Logout</a> </br></br>


<form action ="tech.php" method="POST">
    <input type="text" name="filter" placeholder="Enter Ticket no.">
    <input type="submit" name="search" value="Search"></br>
</form>

<table border="1" cellspacing="0" cellpadding="3px">
<th>ID</th>
<th>Phone</th>
<th>Subject</th>
<th>Descreption</th>
<th>Create Date</th>
<th>Status</th>
<th>Reason</th>
<th>Assigned From</th>
<!--<th>Action</th>-->
</tr>
<?php

//to update the case/ticket
if(isset($_POST['update'])){


    //$result = mysqli_query($con,"UPDATE tickets SET assignto = '{$_POST['assignTo']}',status = '{$_POST['status']}' WHERE id = '{$_POST['hidden_value']}'");
    $sql2 = "UPDATE tickets SET assignto = '{$_POST['assignTo']}',status = '{$_POST['status']}' ";

    if($_POST['status'] == "closed"){

    $sql2.= ",reason = '{$_POST['reason']}'";
    }
    $sql2.= " WHERE id = '{$_POST['hidden_value']}'";

    $result = mysqli_query($con,$sql2);
}

//to search about ticket
if(isset($_POST['search']) && $_POST['filter'] != ""){

    $sql="SELECT * FROM tickets INNER JOIN members ON tickets.member_id = members.member_id WHERE tickets.id = '".$_POST['filter']."'";
    $result=mysqli_query($con,$sql);

}

else{

    switch ($_SESSION['class'])
    {
        case "2":
            $class = "Helpdesk";
            break;

        case "3":
            $class = "System Admin";
            break;

        case "4":
            $class = "voice";
            break;

        case "5":
            $class = "noc";
            break;

    }

    $sql="SELECT * FROM tickets INNER JOIN members ON tickets.member_id = members.member_id WHERE members.member_id = '".$_SESSION['member_id']."'";
    $result=mysqli_query($con,$sql);
}


//to get data from DB to table
if (mysqli_num_rows($result)>0) {
	while ($row=mysqli_fetch_assoc($result))
	{
            if($row['status'] != "closed"){

?>
<form action="tech.php" method="POST">
<tr>
                <input type="hidden" name="hidden_value" value="<?php echo $row['id'];?>">
                <td><?=$row['id']?></td>
                <td><?=$row['phone']?></td>
                <td><?=$row['subject']?></td>
                <td><?=$row['description']?></td>
                <td><?=$row['createdate']?></td>

                

                <td>
                    <select name="status">
                                    <option value="open" <?php if($row['status'] == 'open') echo 'selected'; ?>>Open</option>
                                    <option value="resolved" <?php if($row['status'] == 'resolved') echo 'selected'; ?>>Resolved</option>
                                    <option value="closed" <?php if($row['status'] == 'closed') echo 'selected'; ?>>Close</option>
                    </select>
                </td>


                <td>

                    <textarea name="reason" rows="3" cols="25">

                    </textarea>

                </td>


                <td>
                    <input type="submit" name="update" value="submit">
                </td>



        </tr>
        </form>

<?php
            }
          }
	}
?>

</table>
