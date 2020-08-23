<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../obj/utenti.php';

$email=$_POST['mai'];
$password=md5($_POST['psw'].DB_SALT);
$cognome=$_POST['cog'];
$nome=$_POST['nom'];
$telefono=$_POST['tel'];
$citta=$_POST['cit'];
$indirizzo=$_POST['ind'];
//if ($password!=$verifica)echo'Avevo detto che le pass erano diverse torna indietro e fai le cose come si deve!';exit;


$database = new Database();
$db = $database->getConnection();

$user = new Utenti($db);
$user->email=$email;
$user->password=$password;
$user->cognome=$cognome;
$user->nome=$nome;
$user->telefono=$telefono;
$user->citta=$citta;
$user->indirizzo=$indirizzo;

if($user->create())
{
	header("location: http://127.0.0.1:8080/index.php");
}
else
{
    echo '{"message": "Impossobile inserire l\' utente!"}';
}

?>