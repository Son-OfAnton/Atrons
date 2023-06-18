<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
header('Access-Control-Max-Age: 86400');

include_once '../../config/Database.php';
include_once '../../models/User.php';

$database = new Database();
$db = $database->connect();

$user = new User($db);

$data = json_decode(file_get_contents("php://input"));

// Set user properties
$user->first_name = $data->firstName;
$user->last_name = $data->lastName;
$user->email = $data->email;
$user->phone = $data->phone;
$user->password = $data->password;
$user->gender = $data->gender;

// Register user
if ($user->register()) {
    echo json_encode(
        array('message' => 'User registered successfully')
    );
} else {
    echo json_encode(
        array('message' => 'Failed to register user')
    );
}
