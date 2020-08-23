<?php
include "sessioni.php";
if ($email)
{
	$_SESSION=array(); 
	session_destroy();
	header('location: http://127.0.0.1:8080/index.php');
	
}
else
{
	header("location: http://127.0.0.1:8080/err.php");
	exit;
}
?>