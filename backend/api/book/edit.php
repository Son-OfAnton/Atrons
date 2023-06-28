<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Book.php';

$database = new Database();
$db = $database->connect();

$book = new Book($db);

$uploaded = false;
$target_dir = "../../../frontend/assets/";

echo isset($_FILES["cover_photo"]["error"]);

if (isset($_FILES["cover_photo"]["name"]) && $_FILES["cover_photo"]['error'] === 0) {
    var_dump($_FILES["cover_photo"]);

    $target_dir = $target_dir . basename($_FILES["cover_photo"]["name"]);
    echo $target_dir;
    if (move_uploaded_file($_FILES["cover_photo"]["tmp_name"], $target_dir)) {
        $book->update_image($_REQUEST['isbn'], $target_dir);
    }
}

$updated = $book->update_info($_REQUEST);
if ($updated) {
    header("Location: http://localhost/atrons/admin-page/admin.php");
}
