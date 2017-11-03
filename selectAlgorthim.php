<?php

$db_host="localhost";
$db_user="aliexam2_admin";
$db_pass="123456789";
$db_name="aliexam2_anlineQustion";
$db_table="first";




$link = mysqli_connect("localhost",$db_user, $db_pass, $db_name);
$link ->set_charset("utf8");




$response=array();

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 $type=$_POST['type'];
// Attempt select query execution
$sql = "SELECT id , w1,w2,w3,w4 FROM algorithm WHERE  type='$type'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        
            $response["algorithm"]=array();

        while($row = mysqli_fetch_array($result)){
           $temp=array();
			$temp["id"]=$row["id"];
			$temp["w1"]=$row["w1"];
			$temp["w2"]=$row["w2"];
			$temp["w3"]=$row["w3"];
			$temp["w4"]=$row["w4"];
				
			array_push($response["algorithm"] , $temp);
        }
        $response["t"]=1;
	   echo json_encode($response);
        // Free result set
        mysqli_free_result($result);
    } else{
    
       
	   $response["message"]="not found";
	    $response["t"]=0;
	   echo json_encode($response);
    }
} else{
    
}
 
// Close connection
mysqli_close($link);


?>