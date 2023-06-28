<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Book.php';

$database = new Database();
$db = $database->connect();

echo "delleted";
$book = new Book($db);

$ISBN = isset($_GET['isbn']) ? $_GET['isbn'] : die(json_encode(array('message' => 'Invalid title parameter')));
$book->delete_book($ISBN);
echo "delleted";
header("Location: http://localhost/atrons/admin-page/admin.php");
exit;
