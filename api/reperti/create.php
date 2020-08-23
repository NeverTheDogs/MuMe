<?php
// headers richiesti per il post
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include "api/shared/sessioni.php";
include_once '../config/database.php';
include_once '../obj/reperti.php';

// preparazione oggetti
$database = new Database();
$db = $database->getConnection();
$rep = new Reperti($db);


// ottieni dati dal post
$data = json_decode(file_get_contents("php://input"));
$rep->descrizione = $data->descrizione;
$rep->datazione = $data->datazione;
$rep->luogo_rit = $data->luogo_rit;
$rep->data_rit = $data->data_rit;
$rep->data_ins = date('Y-m-d H:i:s');
$rep->ut = $email;


// chiamata metodo create
if($rep->create())
{
    echo '{"message": "Il reperto è stato inserito."}';
}
else
{
    echo '{"message": "Impossobile inserire il reperto!"}';
}

?>