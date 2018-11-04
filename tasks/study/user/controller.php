<?php

	include 'connection.php';
	// include 'user_form';
	include 'function.php';
	
	
		$get= select($con);
		
		echo $get['username'];	
			//print_r($get);		
		
?>