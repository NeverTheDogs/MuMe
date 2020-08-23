<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../obj/utenti.php';
include "api/shared/sessioni.php";


$email=$_POST['mai'];
$password=md5($_POST['psw'].DB_SALT);

$database = new Database();
$db = $database->getConnection();

$user = new Utenti($db);
$user->email=$email;
$user->password=$password;

$user->readOne();
$num = $user->num;

if($num==1)
{
    session_start();
    setcookie("utente", $email, time() + (60), "/"); //(86400 * 30) = 1 giorno * 30
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    header("location: http://127.0.0.1:8080/home.php");
}
else
{
	header("location: http://127.0.0.1:8080/api/shared/err.php");
}




?>