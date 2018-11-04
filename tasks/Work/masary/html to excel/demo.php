<!DOCTYPE html>
<html>
<head>
	<title>html to excel sheet</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="jquery.table2excel.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(e){
            
             $("#myButton").click(function(e){

             	 $("mytable").table2excel({

             	 	name:"t2execl",
             	 	filename:"myfile",
             	 	fileext:".xls"
             	 });
             });

    	});
    </script>
</head>
<body>
  
   <button id="myButton">Click to download excel</button>
    <table class="mytable" border="1">
    	
    	<tr>
    		<th>header 1</th>
    		<th>header 2</th>
    		<th>header 3</th>
    		<th>header 4</th>
    	</tr>
    	<tr>
    		<td>data 1</td>
    		<td>data 2</td>
    		<td>data 3</td>
    		<td>data 4</td>
    	</tr>
    	<tr>
    		<td>data 1</td>
    		<td>data 2</td>
    		<td>data 3</td>
    		<td>data 4</td>
    	</tr>
    	<tr>
    		<td>data 1</td>
    		<td>data 2</td>
    		<td>data 3</td>
    		<td>data 4</td>
    	</tr>
    	<tr>
    		<td>data 1</td>
    		<td>data 2</td>
    		<td>data 3</td>
    		<td>data 4</td>
    	</tr>
    </table>
</body>
</html>