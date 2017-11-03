<?php

$db_host="localhost";
$db_user="aliexam2_admin";
$db_pass="123456789";
$db_name="aliexam2_anlineQustion";
$db_table="sms";




$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die("error1");

$con ->set_charset("utf8");

$response=array();

$username=$_POST['username'];
$type=$_POST['type'];



$query = "UPDATE answerd_user SET `score`=1 WHERE username='$username' and type ='$type'";
$saved=mysqli_query($con,$query);
if($saved){
 $response["t"]=1;
	   echo json_encode($response);
}else
{
 $response["t"]=0;
	   echo json_encode($response);
}
 

?>