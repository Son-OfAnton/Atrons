<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/User.php';

$database = new Database();
$db = $database->connect();

$user = new User($db);

$result = $user->get_all_users();
$count = $result->rowCount();

if ($count > 0) {
    $users_arr = array();
    $users_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $user_item = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => $password,
            'gender' => $gender,
            'phone'  => $phone,
        );

        array_push($users_arr['data'], $user_item);
    }

    echo json_encode($users_arr);
} else {
    echo json_encode(
        array('message' => 'NO users found')
    );
}
