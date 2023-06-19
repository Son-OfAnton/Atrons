<?php
class Cart
{
    private $conn;
    private $table = 'Cart';

    public $email;
    public $ISBN;


    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function add_to_cart($email, $ISBN)
    {
        // Check if the book is already in the cart for the user
        $query = 'SELECT * FROM Cart WHERE email = ? AND ISBN = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $this->ISBN);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return false; // Book is already in the cart
        }

        // Insert the book into the cart table
        $query = 'INSERT INTO Cart (email, ISBN) VALUES (?, ?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $this->ISBN);

        if ($stmt->execute()) {
            return true; // Book added to cart successfully
        } else {
            return false; // Error adding book to cart
        }
    }
}
