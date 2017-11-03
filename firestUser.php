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
 
// Attempt select query execution
$sql = "SELECT * FROM first_user";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        
            $response["firstuser"]=array();

        while($row = mysqli_fetch_array($result)){
           $temp=array();
			$temp["username"]=$row["username"];
			$temp["mobile"]=$row["mobile"];
			$temp["register"]=$row["register"];
				
							
			array_push($response["firstuser"] , $temp);
        }
        $response["t"]=1;
	   echo json_encode($response);
        // Free result set
       // mysqli_free_result($result);
    } else{
    
        echo "No records matching your query were found.";
        $response["t"]=0;
	   $response["message"]="not found";
	   echo json_encode($response);
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);


?>