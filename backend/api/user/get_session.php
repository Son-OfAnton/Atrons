<?php
session_start();

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    echo json_encode(array(
        'email' => $email
    ));
} else {
    echo json_encode(array(
        'email' => ''
    ));
}
