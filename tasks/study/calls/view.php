<?php

include 'connection.php';

?>

<!DOCTYPE HTML>
<html>
  <head>
     <title>Electrolux Q Unavailable</title>
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
    <br>
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
   
     <div class="col-md-4">
    <div>
      <!-- <label>Queue</label> -->
      <select name="qselect">
        <option>Select Queue</option>
          
          <?php
          $sql= "SELECT DISTINCT QUEUE FROM `datamart_queue_details`";
          $result= mysqli_query($conn,$sql);
          
            if (mysqli_num_rows($result) > 0) 
              {
               while($row = mysqli_fetch_array($result)) 
               {
                 echo '<option>'.$row["QUEUE"].'</option>';
               }
               }
          ?>
          
      </select> 
    </div>
   </div>
   

   </div>
   
    
 <div class="row">
   </div>
      <input type="submit" name="submit" value="Submit"  class="btn btn-primary">
</div>

    <script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'yyyy/MM/dd hh:mm:ss',
        language: 'en'
      });
      $('#datetimepicker2').datetimepicker({
        format: 'yyyy/MM/dd hh:mm:ss',

        language: 'en'
      });

        $(function () {
        $('#startdate').datetimepicker({
            format: 'YYYY/MM/DD HH:mm:ss',
            defaultDate: ' {{date("Y/m/d")}} 00:00:00'
        });
        $('#enddate').datetimepicker({
            format: 'YYYY/MM/DD HH:mm:ss',
            defaultDate: ' {{date("Y/m/d")}} 23:59:59',
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
