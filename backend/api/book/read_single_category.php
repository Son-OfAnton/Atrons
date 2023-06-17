<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Book.php';

$database = new Database();
$db = $database->connect();

$book = new Book($db);

$category = isset($_GET['category']) ? $_GET['category'] : die(json_encode(array('message' => 'Invalid category parameter')));

$result = $book->get_books_by_category($category);
$count = $result->rowCount();

if ($count > 0) {
    $books_arr = array();
    $books_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $book_item = array(
            'ISBN' => $ISBN,
            'title' => $title,
            'author' => $author,
            'description' => $description,
            'cover_photo' => $cover_photo,
            'price' => $price,
            'num_copies' => $num_copies,
            'category' => $category,
        );

        array_push($books_arr['data'], $book_item);
    }

    echo json_encode($books_arr);
} else {
    echo json_encode(
        array('message' => 'No books found in the specified category')
    );
}
