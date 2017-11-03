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
 $user=$_POST['username'];
// Attempt select query execution
$sql = "SELECT * FROM users WHERE  username='$user'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        
            $response["information"]=array();

        while($row = mysqli_fetch_array($result)){
           $temp=array();
			$temp["username"]=$row["username"];
			$temp["name"]=$row["name"];
			$temp["family"]=$row["family"];
			$temp["fathername"]=$row["fathername"];
			$temp["code"]=$row["code"];
			$temp["email"]=$row["email"];
			$temp["ostan"]=$row["ostan"];
			$temp["city"]=$row["city"];
			$temp["address"]=$row["address"];
			$temp["mobile"]=$row["mobile"];
				
			array_push($response["information"] , $temp);
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
