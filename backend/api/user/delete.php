<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/User.php';

$database = new Database();
$db = $database->connect();

$user = new User($db);

echo $_GET["email"];
$email = isset($_GET['email']) ? $_GET['email'] : die(json_encode(array('message' => 'Invalid title parameter')));
$user->delete_book($email);

header("Location: http://localhost/Atrons/admin-page/admin.php");
exit;
?>