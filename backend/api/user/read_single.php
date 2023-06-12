<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/User.php';

$database = new Database();
$db = $database->connect();

$user = new User($db);

$user->user_id = isset($_GET['email']) ? $_GET['email'] : die(json_encode(array('message' => 'Invalid email parameter')));
$userObj = $user->get_single_user();

if ($userObj) {
    $user_arr = array(
        'first_name' => $userObj->first_name,
        'last_name' => $userObj->last_name,
        'email' => $userObj->email,
        'password' => $userObj->password,
        'gender' => $userObj->gender,
        'phone'  => $userObj->phone,
    );

    echo json_encode($user_arr);
} else {
    echo json_encode(array('message' => 'User not found'));
}
