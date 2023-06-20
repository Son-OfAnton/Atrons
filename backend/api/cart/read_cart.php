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

$cart = new Cart($db);

$data = $cart->read_cart('john@example.com');

echo json_encode($data);
// if(isset('john@example.com')) {
// }
