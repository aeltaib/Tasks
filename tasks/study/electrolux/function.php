<?php

//main function
 function call_details($conn,$start_date,$end_date,$qselect,$phone)
{

    if (empty($phone)) 
    {
        $sql= "SELECT QUEUE,EVENT_TIME,EVENT,ANI FROM datamart_queue_details WHERE EVENT= 'abandoned' and EVENT_TIME>= '$start_date' and EVENT_TIME<= '$end_date' and QUEUE= '$qselect' OR ANI= '$phone'";

    }else 
    {
        $sql= "SELECT QUEUE,EVENT_TIME,EVENT,ANI FROM datamart_queue_details WHERE EVENT= 'abandoned' and EVENT_TIME>= '$start_date' and EVENT_TIME<= '$end_date' and QUEUE= '$qselect' and ANI= '$phone'";   
    }

        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) > 0) 
        {
  
            while($row = mysqli_fetch_assoc($result)) 
            {
                              $queue= $row['QUEUE'];
                              $event= $row['EVENT'];
                              $start_date= $row['EVENT_TIME'];
                              $end_date= $row['EVENT_TIME'];
                              $ani= $row['ANI'];

                           echo '<tr>';
                           echo '<td  align="center">'.$queue.'</td>';
                           echo '<td  align="center">'.$event.'</td>';
                           echo '<td  align="center">'.$start_date.'</td>';
                           echo '<td  align="center">'.$end_date.'</td>';
                           echo '<td  align="center">'.$ani.'</td>';
                           echo '</tr>';
            }
                         
    }
                       
}


//function to change from seconds to hours
 function foo($seconds) 
{
  $t = round($seconds);
  return sprintf('%02d:%02d:%02d', ($t/3600),($t/60%60), $t%60);
}

?>