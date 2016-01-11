<?php

include_once 'dataQuery.php';

ini_set('auto_detect_line_endings',TRUE); //deals with differing line ending  
														// </n> in  linux and </lf /cr> in windows
														


$prevVel = 0;
$prevTime = 0;


$db;
$time;
$date;
$dateStr;

$formatStr = "Y-m-d H:i:s";
$values = file("database.ini" );//database.ini defines the column headings in sequence left to right.
$acc;
$sql;


if (($handle = fopen("velData.csv", "r")) !== FALSE) { //file exists
   
  $db = new Db();
  
  $time = microtime(true);
  list($sec,$usec) = explode('.',$time);
  
  
  $date = new DateTime("@$sec");
  
//  echo $date->format($formatStr).".".$usec."\n";
  
   
   
    while (($data = fgetcsv($handle, 500, ",")) !== FALSE) {      
       
       $dateStr = $date->format($formatStr).".".$usec;             
      
      // echo "Time is ".$dateStr."\n";
       
       //Calculate Acceleration
       $acc = acceleration($data[2],$time);
  
		/* echo "Speed is ".$data[2]."\n";          
       echo "Acceleration is ". $acc ." M/s \n";
       echo "Latitude is ".$data[3]."\n";
       echo "Longitude is ".$data[4]."\n";
       echo "Altitude is ".$data[5]."\n \n"; */
       
         
        $sql = "INSERT INTO `DataPoint` (`pointID`, `dataID`, `time`, `acceleration`, `velocity`, `latitude`, `longitude`, `altitude`) 
        VALUES (NULL, '1', '$dateStr', '$acc', '$data[2]', '$data[3]', '$data[4]', '$data[5]');";
        
       // echo $sql."\n";
        
        
        $result = $db->query($sql);

		if($result){echo "Record added "."\n" ;
		
		}else {
		echo "Error in record sql return ".$result."\n ";

		}
        
        $time =  $time + 0.25; //add 250 millsecs
		  list($sec,$usec) = explode('.',$time);
		
		//  echo "time stamp is ".$time."\n";           
     //   echo "Sec is ".$sec."\n";
          
        
      $date->setTimestamp($sec);  
        
        
    }
    fclose($handle);

}else {

	echo " \n File not found \n";
}



function acceleration($vec,$time):float {


$temp;



$temp = $vec - $GLOBALS['prevVel'];
//$temp = $temp/($time -$GLOBALS['prevTime'] );
$temp = $temp/0.25; //Magic number temp

$GOBALS['prevVel'] = $vec;
$GOBALS['prevTime']  = $time;

return $temp;



}



?>