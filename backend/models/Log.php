<?php
class Log
{
    private $conn;
    public $email;
    public $ISBN;
    public $purchase_date;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function get_all_records() 
    {
        $query = "SELECT * FROM `purchase_record`";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}