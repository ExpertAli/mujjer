<?php
$conn=new mysqli('localhost','root','','industrial');

if(!$conn){
	die($conn->error);
	
}else{
	header('index.php');
}


?>