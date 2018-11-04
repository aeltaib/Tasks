<?php

//server config
$servername= 'localhost';
$db_admin = 'aheevaccs';
$db_password = 'aheevaccs';
$db = 'aheevaccs';
$conn = mysqli_connect($servername, $db_admin, $db_password, $db);
mysqli_select_db($conn,"dropdown");

?>

<!DOCTYPE HTML>
<html>
  <head>
     <title>Call Status</title>
   <link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="html to excel/dist/jquery.table2excel.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
     <script type="text/javascript">
    	$(document).ready(function() {
  $("#myButton").click(function(e) {
    e.preventDefault();

    //getting data from our table
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('table_wrapper');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');

    var a = document.createElement('a');
    a.href = data_type + ', ' + table_html;
    a.download = 'agent_event_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
    a.click();
  });
});
</script>
  </head>
  <body>
<form name="form1" action="" method="POST">
<div class="container">
 <div class="row">

<!-- date time picker -->
  <div class="col-md-4">
    <div id="datetimepicker" class="input-append date">
       <label>Start Date</label>
      <input type="text" name="start_date"></input>
      <span class="add-on">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
      </span>
    </div>
   </div>

  <div class="col-md-4">
    <div id="datetimepicker2" class="input-append date">
      <label>End Date</label>
      <input type="text" name="end_date"></input>
      <span class="add-on">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
      </span>
    </div>
   </div>


   </div>


     <div class="col-md-4" style="display:none">
    <div>
        <label>Agent</label>
        <select name="agent" id="agent">
          <option val="">select Agent</option>
                     <?php
             $sql = "select login_id ,dbid from cfg_person  where agent_group_dbid = 111";

              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
               while($row = mysqli_fetch_assoc($result)) {

                 echo '<option value="' . $row["login_id"] . '">'.$row["login_id"].'</option>';
                 }
               }

             ?>

        </select>
    </div>


 </div>

 <div class="row">


   </div>
      <input type="submit" name="submit" value="Submit"  class="btn btn-primary">

</div>

    <script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'yyyy/MM/dd hh:mm:ss',
        //format: 'MM/dd/yyyy hh:mm:ss',
        language: 'en'
      });
      $('#datetimepicker2').datetimepicker({
        format: 'yyyy/MM/dd hh:mm:ss',
        //format: 'MM/dd/yyyy hh:mm:ss',

        language: 'en'
      });

      	$(function () {
        $('#startdate').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            defaultDate: ' {{date("Y-m-d")}} 00:00:00'
        });
        $('#enddate').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            //format: 'MM/dd/yyyy hh:mm:ss',
            defaultDate: ' {{date("Y-m-d")}} 23:59:59',
            useCurrent: false //Important! See issue #1075
        });
        $("#startdate").on("dp.change", function (e) {
            $('#enddate').data("DateTimePicker").minDate(e.date);
        });
        $("#enddate").on("dp.change", function (e) {
            $('#startdate').data("DateTimePicker").maxDate(e.date);
        });
    });

    </script>
</form>
  </body>
</html>

<?php

if(isset($_POST['submit']))
{
 $S_Data = $_POST["start_date"];
 $E_Data = $_POST["end_date"];
 }

// Create connection
$conn = mysqli_connect($servername, $db_admin, $db_password,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//function to change from seconds to hours
 function foo($seconds) {
  $t = round($seconds);
  return sprintf('%02d:%02d:%02d', ($t/3600),($t/60%60), $t%60);
}


//main function
 function call_details($conn,$start_date,$end_date)
   {

// $sql = "select * from datamart_call_details where GRP_DBID in('48','61') and EVENT_TIME>='$start_date' and EVENT_TIME <='$end_date' and `N_TRANSFER`>'0' order by AGENT_ID";

$sql = "select * from datamart_call_details where GRP_DBID in('48','61') and EVENT_TIME>='$start_date' and EVENT_TIME <='$end_date' and `N_TRANSFER`>'0' group by AGENT_ID,START_TIME, END_TIME, DIRECTION,DNIS,ANI";

$result = mysqli_query($conn, $sql);

$agent_id=0;

 
 //to fetch rows
$num_rows = mysqli_num_rows($result);

if (mysqli_num_rows($result) > 0) {
          
     $index=0;
    while($row = mysqli_fetch_assoc($result)) {
                              //echo 'hello';
                              $agent_id= $row['AGENT_ID'];
                                $start_time=$row['START_TIME'];
                              $end_time=$row['END_TIME'];
                               $direction=$row['DIRECTION'];
                                $dnis=$row['DNIS'];
                                $ani=$row['ANI'];

                           //to put data in table
                           echo '<tr>';
                           echo '<td  align="center">'.$agent_id.'</td>';
                           echo '<td  align="center">'.$start_time.'</td>';
                           echo '<td  align="center">'.$end_time.'</td>';
                           echo '<td  align="center">'.$direction.'</td>';
                           echo '<td  align="center">'.$dnis.'</td>';
                           echo '<td  align="center">'.$ani.'</td>';

                           echo '</tr>';

                         }

                        }
}

if(isset($_POST["submit"])){
 if(!empty($_POST['start_date']) && !empty($_POST['end_date']))
   {

echo '<button id="myButton" class="btn btn-warning btn-xs">download excel</button>';
}
}

$created_at=date('Y-m-d H:i:s');

//draw table
echo '<div id="table_wrapper">';

echo '<table id="datatable" class="mytable responstable" style="width: 50%; border-collapse:collapse;margin:auto;"border="2" bordercolor="#CCCCCC" cellpadding="0" cellspacing="collapse" align="center"><caption>Call Status</caption> <tr style="background-color:#167F92;color:white;">';
echo '<th  align="center" ><b>Activity period</th>
      <th  align="center" ><b>Created at</th>

</tr><tr>';

//if(isset($_POST['submit'])){
 //$full_period = $S_Data." - ".$E_Data;

//echo '<td  align="center">'."$full_period".'</td>';
//}
echo '<td  align="center">'.$created_at.'</td>';


echo "</tr>\n";
echo "<tr>";
echo "</tr>\n";


echo '<table id="datatable" class="mytable responstable" style="border-collapse:collapse;margin:5px;" border="2" bordercolor="#CCCCCC" cellpadding="0" cellspacing="collapse" align="center" width="100%"><tr style="background-color:#167F92;color:white;">';
echo '<th  align="center"><b>AGENT_ID</th>
      <th  align="center"><b>START_TIME</th>
      <th  align="center"><b>END_TIME</th>
      <th  align="center"><b>DIRECTION</th>
      <th   align="center"><b>DNIS</b></th>
      <th  align="center"><b>ANI</b></th>

</tr><tr>';

echo ' </div>';


if(isset($_POST['submit'])){
   if(!empty($_POST['start_date']) && !empty($_POST['end_date']))
   {

  call_details($conn,$S_Data,$E_Data);
   }

elseif(!empty($_POST['start_date']) && !empty($_POST['end_date']))

        {

                           call_details($conn,$S_Data,$E_Data);
                           /*
                           $result = mysqli_query($conn, $sql);
                           if (mysqli_num_rows($result)>0)
                        {


                           echo '<tr>';
                           echo '<td  align="center">'.$agent_id.'</td>';
                           echo '<td  align="center">'.$start_time.'</td>';
                           echo '<td  align="center">'.$end_time.'</td>';
                           echo '<td  align="center">'.$direction.'</td>';
                           echo '<td  align="center">'.$dnis.'</td>';
                           echo '<td  align="center">'.$ani.'</td>';

                           echo '</tr>' ;

                 }
                 */
        }
                }
                //}

echo "</table>\n";

mysqli_close($conn);


?>

