<?php

/* for loop
//1. Create a script that displays 1-2-3-4-5-6-7-8-9-10 on one line. There will be no hyphen(-) at starting and ending position.

for ($i=1; $i <=10 ; $i++) 
{ 
    if($i<10)
    {
        echo "$i-";
    }else 
    {
        echo "$i"."\n";
    }
    
}
*/
/*
//2. Create a script using a for loop to add all the integers between 0 and 30 and display the total.

$sum=0;

for ($i=0; $i < 30 ; $i++) 
{ 
    $sum+= $i;
}
echo "the total is: $sum";  
*/


/* array
//13. Write a PHP script which displays all the numbers between 200 and 250 that are divisible by 4.

for ($i=200; $i <=250 ; $i++) 
{ 
    if($i%4==0)
    {
        echo "$i, ";
    }
}
*/
/*
//Write a PHP script to sort an array in reverse order (highest to lowest).

$name= array('ahmed','mahmoud','badry','eltaib');

rsort($name);
print_r($name);
*/
//3. Write a program in C to find the sum of all elements of the array.
/*
    if (isset($_POST['btnsubmit'])) 
    {
        $num1= $_POST['txtnum1'];
        $num2= $_POST['txtnum2'];
        $num3= $_POST['txtnum3'];
    
        $sum=0;
    
        $sum = array($num1,$num2,$num3);
    
        echo array_sum($sum);
    }
*/
/*
    function sum($arr,$n)
    {
            $sum=0;
            
            foreach ($arr as $element) 
            {
                $sum+= $element;
            }
                return $sum;
            // for ($i=0; $i < $n; $i++) 
            //  {
            //     $sum+= $arr[$i];
            //  } 
            //     return $sum;
            
    }
    
    if (isset($_POST['btnsubmit'])) 
        {
            $num1= $_POST['txtnum1'];
            $num2= $_POST['txtnum2'];
            $num3= $_POST['txtnum3'];
            
            $arr = array($num1,$num2,$num3);
            $n= sizeof($arr);
            
            echo "the sum of the array is: ". sum($arr,$n);
        }

*/    


//function
/*
//2. Write a program in C to find the square of any number using the function.

if (isset($_POST['btnsubmit'])) 
{
    function square($x)
    {
        $x*= $x;
        echo $x;
    }
    
    $t= $_POST['txtsquare'];
    square($t);
}
*/
/*
//4. Write a program in C to check a given number is even or odd using the function.

if (isset($_POST['btnsubmit'])) 
{
    function check($x)
    {
        if ($x%2==0) 
        {
            echo 'Even';
        }else 
        {
            echo 'Odd';
        }
    }
    
    $t= $_POST['txtcheck'];
    check($t);
    
}
*/
/*
//3. Write a program in C to swap two numbers using function.

function swap($x,$y)
{
    $tmp;

    $x= $tmp;
    $y= $x;
    $tmp= $y;
    
    echo $x.' '.$y;
}

    $a= $_POST['txtnum1'];
    $b= $_POST['txtnum2'];
    
    swap($a,$b);   
*/  


?>
<!--//2. Write a program in C to find the square of any number using the function.-->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Square number</title>
</head>
<body>
    <form method="post">
        <input type="text" name="txtsquare">
        <input type="submit" name="btnsubmit" value="Submit">        
    </form>
</body>
</html> -->

<!--//4. Write a program in C to check a given number is even or odd using the function.-->
<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Check number</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form method="post">
        <input type="text" name="txtcheck">
        <input type="submit" name="btnsubmit" value="Check">
    </form>
</body>
</html> -->

<!--<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Swap numbers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form method="post"><br/>
        <input type="text" name="txtnum1" placeholder="#1" autofocus><br/><br/>
        <input type="text" name="txtnum2" placeholder="#2"><br/><br/>
        <input type="text" name="txtnum3" placeholder="#3"><br/><br/>
        
        <input type="submit" name="btnsubmit" value="Sum">
    </form>
</body>
</html>-->
