<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../obj/reperti.php';

// preparazione oggetti
$database = new Database();
$db = $database->getConnection();
$rep = new Reperti($db);
 
//ottieni id del reperto dal get
$rep->id = isset($_GET['id']) ? $_GET['id'] : die();
 
//chiamata metodo search
$rep->search();
 
// create array
$reperto = array(
    "id" =>  $rep->id,
    "descrizione" => $rep->descrizione,
    "datazione" => $rep->datazione,
    "luogo_rit" => $rep->luogo_rit,
    "data_rit" => $rep->data_rit
    //"img" => $rep->img
 
);
// make it json format
print_r(json_encode($reperto));
?>
