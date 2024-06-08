<?php
session_start();
 error_reporting(0);
 ini_set('display_errors', 0);

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="teacher";




//$con = mysqli_connect($servername, $username, $password, $dbname);

$con = mysqli_connect("localhost","root","","teacher");



$con2 = $con;




$res_id=$_SESSION['RESTID'];






//// get title 


if(empty($res_id)){
	
	$res_id=htmlspecialchars($_GET['b'], ENT_QUOTES, 'UTF-8');
	
	
}


$title="Peer Tutor Booking";
$title_manage="Peer Tutor";
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>