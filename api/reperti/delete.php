<?php
// headers richiesti per il post
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../obj/reperti.php';

// preparazione oggetti
$database = new Database();
$db = $database->getConnection();
$rep = new Reperti($db);
 
// ottieni id del reperto dal post
$data = json_decode(file_get_contents("php://input"));
 
$rep->id = $data->id;
 
//chiamata metodo delete
if($rep->delete())
{
    echo '{"message": "Il reperto è stato eliminato."}';
}
else
{
    echo '{"message": "Impossibile eliminare il reperto"}';
}

?>