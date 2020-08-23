<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../obj/utenti.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product ouser = new Product($db);
$user = new Utenti($db);
// set ID property of product to be edited
$user->usr = isset($_GET['usr']) ? $_GET['usr'] : die();
 
// read the details of product to be edited
$user->readOne();
 
// create array
$user_arr = array(
    "username" =>  $user->username,
    "password" => $user->password
 
);
 
// make it json format
print_r(json_encode($user_arr));
?>