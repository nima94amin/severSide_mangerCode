<?php

$db_host="localhost";
$db_user="aliexam2_admin";
$db_pass="123456789";
$db_name="aliexam2_anlineQustion";
$db_table="sms";



$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die("error1");
$con ->set_charset("utf8");

$response=array();

$number=$_POST['number'];
$count=$_POST['counter'];
$counter=intval($count);
//$int=intval($string);// $int is the converted string to integer  $int=intval('5');


$query = "INSERT INTO sms VALUES('$number','$counter')";
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