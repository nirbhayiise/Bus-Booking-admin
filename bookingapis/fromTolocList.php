<?php
    
include('dbcon.php');
   
    $i=0;
    $j=0;
    $arr=array();
$sql="SELECT * from bus_route where route_state=1 GROUP BY bus_source,bus_dest order by route_id DESC";
		$result=mysqli_query($db,$sql);
		//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if(mysqli_num_rows($result) == 0)
		{
			$status = "0";
			$msg = "No data Exist";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;
			
                        $json = json_encode($arr);
		       echo $json;
		}
		else
		{
            
            $status = "1";
            $msg = "Get data Successfully.";
            $arr['response']['status']=$status;
            $arr['response']['message']=$msg;
           
             while($rowInfo= mysqli_fetch_array($result,MYSQLI_ASSOC))
             {
                 
           /* $arr['response']['data'][$i]['route_id'] = $rowInfo['route_id'];
            $arr['response']['data'][$i]['bus_source'] = $rowInfo['bus_source'];
            $arr['response']['data'][$i]['bus_dest'] =$rowInfo['bus_dest'];
			*/
          
			   $arr['response']['data'][$i]['bus_source'] = $rowInfo['bus_source'];
			      $arr['response']['data'][$i]['bus_dest'] = $rowInfo['bus_dest'];
            
            /*
            $arr['response']['data'][$i]['source_time'] = $rowInfo['source_time'];
            
            $arr['response']['data'][$i]['des_time'] =$rowInfo['des_time'];
            $arr['response']['data'][$i]['bus_id'] = $rowInfo['bus_id'];
          */
            

                 $i++;
             }
            $json = json_encode($arr);
            echo $json;
			}
			
    ?>
