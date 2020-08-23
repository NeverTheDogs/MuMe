<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../obj/utenti.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$user = new Utenti($db);
 
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of product to be edited
//$user->id = $data->id;
 
// set product property values
$user->username = $data->username;
$user->password = $data->password;
$user->cognome = $data->cognome;
$user->nome = $data->nome;
$user->telefono = $data->telefono;
$user->citta = $data->citta;
$user->indirizzo = $data->indirizzo;
$user->email = $data->email;
 
// update the product
if($user->update())
{
    echo '"message": "Product was updated."';
}
else
{
    echo '"message": "Unable to update product."';
}


?>