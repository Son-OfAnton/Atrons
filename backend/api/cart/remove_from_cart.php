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
echo $_GET["isbn"];
if(isset($_GET['isbn']) && isset($_SESSION['email'])) {
    $ISBN = $_GET['isbn'];
    if ($cart->delete_cart($ISBN, $_SESSION['email'])) {
        echo "Successfully Deleted";
    } else {
        echo "Not Deleted";
    }
}

