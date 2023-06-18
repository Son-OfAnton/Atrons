<?php
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

$data = json_decode(file_get_contents("php://input"));

$cart->email = $data->email;
$cart->ISBN = $data->ISBN;


// Create cart
if ($cart->add_to_cart($cart->email, $cart->ISBN)) {
  echo json_encode(
    array('message' => 'Book added to cart')
  );
} else {
  echo json_encode(
    array('message' => 'Failed to add book to cart')
  );
}
