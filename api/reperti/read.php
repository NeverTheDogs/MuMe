<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../obj/reperti.php';

// preparazione oggetti
$database = new Database();
$db = $database->getConnection();
$rep = new Reperti($db);
 
//esecuzine query di lettura reperti
$stmt = $rep->read();
//numero di tutti i reperti trovati
$num = $stmt->rowCount();
 
//controllo dei risultati ricevuti
if($num>0){
 
    //array contentente tutti i reperti
    $rec_arr=array();
    $rec_arr["records"]=array();
 
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // estrazione risultati 
        extract($row);
        $reperti=array(
            "id" => $id,
            "descrizione" => $descrizione
        );
        array_push($rec_arr["records"], $reperti);
    }
    echo json_encode($rec_arr);
}
 
else{
    echo json_encode(
        array("message" => "Nessun reperto trovato.")
    );
}

?>