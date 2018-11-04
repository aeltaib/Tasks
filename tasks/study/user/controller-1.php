<?php

	include 'connection.php';
	include 'function.php';
	

	echo "<div id= 'viewtable'>";

	echo "<table id='tabledata' style='width:30%'; border-collapse:collapse; margin:auto; align='center'; border='1'>";
	
	echo"</br>";
	echo"<tr>
		<th align='center'><b>Username</th>
		<th align='center'><b>Email</th>
		</tr>";

	
		 $get= select($con);
		 $count= count($get);
		
		 for($i=0;$i<$count;$i++)
		 {
		 	echo "<tr>";
		 	echo"<td align='center'>".$get[$i]['username']."</td>";
         	echo"<td align='center'>".$get[$i]['email']."</td>";
         	echo "</tr>";
		 }
		
	echo "</table>";
	echo "</div>";	

	echo' </br></br> <form action="index.php" align="center">
    	<input type="submit" name="submit" value="Go Back">
    </form>'

?>