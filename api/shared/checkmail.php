<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../obj/utenti.php';

$email=$_POST['email'];

$database = new Database();
$db = $database->getConnection();
$user = new Utenti($db);
$user->email=$email;
$user->check();
$num = $user->num;

if($num>0)
{
echo '1';
}
else
{
echo '0';
}
?>