<?php
session_start();

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/User.php';

$database = new Database();
$db = $database->connect();

$user = new User($db);

$user->user_id = isset($_GET['email']) ? $_GET['email'] : die(json_encode(array('message' => 'Invalid email parameter')));
$user->password = isset($_GET['pass']) ? $_GET['pass'] : die(json_encode(array('message' => 'Invalid password parameter')));
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
    $_SESSION['email'] = $user_arr["email"];
    
    header('Location: http://localhost/Atrons/frontend/home.php');
    exit;

} else {
    header('Location: http://localhost/Atrons/frontend/login.php?message=not found');
    exit;
    // echo json_encode(array('message' => 'User not found'));
}
