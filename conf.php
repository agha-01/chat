<?php 

$servername="localhost";
$username="root";
$password="";
$dbname="chat";


$conn=mysqli_connect($servername,$username,$password,$dbname);
if (!$conn) {
	echo "db error";
}
else{
	// echo "qosuldu";
}

@session_start();



 ?>