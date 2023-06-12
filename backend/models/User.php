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

    // get all users
    public function get_all_users()
    {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // get single user by email
    public function get_single_user()
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE email = ?';
        $stmt = $this->conn->prepare($query);

        // bind user_id
        $stmt->bindParam(1, $this->user_id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $user = new User($this->conn);
            $user->first_name = $row['first_name'];
            $user->last_name = $row['last_name'];
            $user->email = $row['email'];
            $user->password = $row['password'];
            $user->gender = $row['gender'];
            $user->phone = $row['phone'];

            return $user;
        } else {
            return null; // User not found
        }
    }
}
