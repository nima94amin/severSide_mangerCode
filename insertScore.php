<?php

$db_host="localhost";
$db_user="aliexam2_admin";
$db_pass="123456789";
$db_name="aliexam2_anlineQustion";
$db_table="first";




$link = mysqli_connect("localhost",$db_user, $db_pass, $db_name);
$link ->set_charset("utf8");

$response=array();

$username=$_POST['username'];
$type=$_POST['type'];
$score1=$_POST['score'];
$score=floatval($score1);
//$int=intval($string);// $int is the converted string to integer  $int=intval('5');


$query = "INSERT INTO scores VALUES('$username','$type','$score')";
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