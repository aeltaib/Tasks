<?php

//main function
 function call_details($conn,$start_date,$end_date,$qselect)
{
        $sql= "SELECT QUEUE,EVENT FROM datamart_queue_details WHERE EVENT_TIME>= '$start_date' and EVENT_TIME<= '$end_date' and QUEUE= '$qselect'";

        $result= mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) > 0) 
        {
            $queuedcount= 0;
            $distributedcount= 0;
            $abandonedcount= 0;
            
            while($row= mysqli_fetch_assoc($result)) 
            {   
                
                if ($row['EVENT']== "queued") 
                {
                    $queuedcount++;
                   
                }elseif($row['EVENT']== "distributed") 
                {
                    $distributedcount++;
                                          
                }elseif($row['EVENT']== "abandoned") 
                {
                    $abandonedcount++;   
                }
                
            }
            
                    echo '<tr>';
                    echo '<td  align="center">'.$queuedcount.'</td>';
                    echo '<td  align="center">'.$distributedcount.'</td>';
                    echo '<td  align="center">'.$abandonedcount.'</td>';
                    echo '</tr>';
                                             
        }
    
}


//function to change from seconds to hours
//  function foo($seconds) 
// {
//   $t = round($seconds);
//   return sprintf('%02d:%02d:%02d', ($t/3600),($t/60%60), $t%60);
// }

?>