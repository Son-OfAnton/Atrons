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

    public function new_book($fields, $image_location)
    {
        $this->ISBN = $fields['isbn'];
        $this->title = $fields['title'];
        $this->author = $fields['author'];
        $this->description = $fields['description'];
        $this->price = intval($fields['price']);
        $this->num_copies = intval($fields['num_copies']);
        $this->category = $fields['category'];
        $this->cover_photo = $image_location;
    
        $query = "INSERT INTO ".$this->table
        . " (`ISBN`, `title`, `author`, `description`, `price`, `num_copies`, `category`, `cover_photo`) "
        . "VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(1, $this->ISBN);
        $stmt->bindParam(2, $this->title);
        $stmt->bindParam(3, $this->author);
        $stmt->bindParam(4, $this->description);
        $stmt->bindParam(5, $this->price);
        $stmt->bindParam(6, $this->num_copies);
        $stmt->bindParam(7, $this->category);
        $stmt->bindParam(8, $this->cover_photo);
    
        return $stmt->execute();
    }

    public function update_info($new_infos) {
        $this->ISBN = $new_infos['isbn'];
        $this->title = $new_infos['title'];
        $this->author = $new_infos['author'];
        $this->description = $new_infos['description'];
        $this->price = intval($new_infos['price']);
        $this->num_copies = intval($new_infos['num_copies']);
        $this->category = $new_infos['category'];
        // $this->cover_photo = $image_location;
    
        $query = "UPDATE ".$this->table
        . " SET `title` = ?, `author` = ?, `description` = ?, `price` = ?, `num_copies` = ?, `category` = ? "
        . "WHERE `ISBN` = ?";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(1, $this->title);
        $stmt->bindParam(2, $this->author);
        $stmt->bindParam(3, $this->description);
        $stmt->bindParam(4, $this->price);
        $stmt->bindParam(5, $this->num_copies);
        $stmt->bindParam(6, $this->category);
        $stmt->bindParam(7, $this->ISBN);

        return $stmt->execute();
        
    }
    
    public function update_image($ISBN, $image_location) {
        $query = "UPDATE ". $this->table ." SET `cover_photo` = ?"
        ." WHERE `ISBN` = ?";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(1, $image_location);
        $stmt->bindParam(2, $ISBN);
        echo $ISBN;
        return $stmt->execute();
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

    public function delete_book($ISBN) {
        $query = 'DELETE FROM ' . $this->table . ' WHERE ISBN = :isbn';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':isbn', $ISBN);

        $stmt->execute();
    }
}
