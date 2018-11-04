<?php

/*
//Write a function to calculate the factorial of a number (a non-negative integer). The function accepts the number as an argument.
/////////////ND///////////////
function factorial($n)
{
	if ($n==0) 
	{
		return 1;
	}else
	{
		return $n* factorial($n-1);
	}
}
print_r($factorial(4)."\n");
*/
/*
//Write a function to reverse a string.
/////////////ND///////////////////
function strrev($str)
{
	$n= strlen($str);
	if ($n==1) 
	{
		return $str;
	}else
	{
		$n--;

		return strrev(substr($str,1, $n)).substr($str,0,1);
	}
}
print_r(strrev('1234')."\n");
*/

//Create a script that displays 1-2-3-4-5-6-7-8-9-10 on one line. There will be no hyphen(-) at starting and ending position.

for ($i=1; $i <=10 ; $i++) 
{ 
	if (i<10) 
	{
		echo "$i-";
	}else
	{
		echo "$i"."\n";
	}
	
}



?>

<!-- <!DOCTYPE html>
<html>
<head>
	<title>Study</title>
</head>
<body>

<input type="text" name="text">
<input type="submit" name="submit" value="submit">

</body>
</html> -->