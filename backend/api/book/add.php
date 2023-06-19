<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Book.php';

$database = new Database();
$db = $database->connect();

$book = new Book($db);

$target_dir = "../../../frontend/assets/";

$uploaded = false;
if (isset($_FILES["cover_photo"])) {
    $target_dir = $target_dir.basename($_FILES["cover_photo"]["name"]);
    
    if (file_exists($target_dir)) {
        echo "Oops, file already exists.";
    }
    
    else if(move_uploaded_file($_FILES["cover_photo"]["tmp_name"], $target_dir)) {$uploaded = true;}

}

$recorded = $book->new_book($_POST, $target_dir);
if($uploaded && $recorded) { header("Location: http://localhost/Atrons/admin-page/admin.php"); }
else {
    echo "An Error Occured";
}
?>