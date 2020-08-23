<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
include_once '../obj/utenti.php';
 
$database = new Database();
$db = $database->getConnection();

// prepare product object
$user = new Utenti($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));

// set product property values
$user->email = $data->email;
$user->password = $data->password;
$user->nome = $data->nome;
$user->cognome = $data->cognome;
$user->telefono = $data->telefono;
$user->citta = $data->citta;
$user->indirizzo = $data->indirizzo;

//$product->created = date('Y-m-d H:i:s');
 
// create the product
if($user->create())
{
    echo '"message": "Product was created."';
}
else
{
    echo '"message": "Unable to create product."';
}

?>