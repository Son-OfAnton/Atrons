<?php
class Book
{
    private $conn;
    private $table = 'Book';

    public $ISBN;
    public $title;
    public $author;
    public $description;
    public $cover_photo;
    public $price;
    public $num_copies;
    public $category;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get all books
    public function get_all_books()
    {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Get single book by title
    public function get_single_book($title)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE LOWER(TRIM(title)) LIKE LOWER(TRIM(?))';
        $stmt = $this->conn->prepare($query);

        $title = "%" . $title . "%"; // Add wildcards to match partial titles
        $stmt->bindParam(1, $title);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->ISBN = $row['ISBN'];
            $this->title = $row['title'];
            $this->author = $row['author'];
            $this->description = $row['description'];
            $this->cover_photo = $row['cover_photo'];
            $this->price = $row['price'];
            $this->num_copies = $row['num_copies'];
            $this->category = $row['category'];

            return $this;
        } else {
            return null; // Book not found
        }
    }
}
