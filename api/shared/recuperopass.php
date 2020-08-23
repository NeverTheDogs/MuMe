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
$pass=rand(11111111, 99999999);
$cypass=md5($pass.DB_SALT);


$database = new Database();
$db = $database->getConnection();
$user = new Utenti($db);


$url = 'https://api.elasticemail.com/v2/email/send';
try{
        $post = array('from' => 'mume@comunedimessina.gov',
		'fromName' => 'MUseo MEssina',
		'apikey' => 'b641dfca-4d44-497d-93d3-5ed034e028e4',
		'subject' => 'Recupero password',
		'to' => $email,
		'bodyHtml' => '<h1>La tua password temporanea per l\'account '.$email.' è '.$pass.'! </h1>',
		'bodyText' => 'Se non hai inviato tu questa richiesta contattaci per ulteriori informazioni !',
		'isTransactional' => false);
		
		$ch = curl_init();
		curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $post,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
			CURLOPT_SSL_VERIFYPEER => false
        ));
		
        $result=curl_exec($ch);
        curl_close ($ch);
}
catch(Exception $ex){
	echo $ex->getMessage();
}
$user->email=$email;
$user->password=$cypass;

if($user->update())
{
	header("location: http://127.0.0.1:8080/index.php");
}
else
{
    echo '{"message": "Impossobile inserire il reperto!"}';
}


?>