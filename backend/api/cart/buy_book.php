<?php
session_start();
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
header('Access-Control-Max-Age: 86400');

include_once '../../config/Database.php';
include_once '../../models/Cart.php';

$database = new Database();
$db = $database->connect();

$data = json_decode(file_get_contents('php://input'), true);

$cart = new Cart($db);

$email = $_SESSION['email'];

$suc = true;
foreach($data as $key=>$value) {
    if(!$cart->checkout($value, $key, $email)) {   
        $suc = false;
        echo json_encode(false);
    }
}
if ($suc) {
    echo json_encode(true); 
}

