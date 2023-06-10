<?php
class User
{
    private $conn;
    private $table = 'User';

    public $user_id;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $gender;
    public $phone;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function get_all_users()
    {
        $query = 'SELECT * from ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
