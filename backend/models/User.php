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
        $query = 'SELECT * FROM ' . $this->table . ' WHERE email = ? and password= ?';
        $stmt = $this->conn->prepare($query);

        // bind user_id and password
        $stmt->bindParam(1, $this->user_id);
        $stmt->bindParam(2, $this->password);
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

    public function register()
    {
        $query = 'INSERT INTO User (email, first_name, last_name, password, gender, phone) 
                  VALUES (:email, :firstName, :lastName, :password, :gender, :phone)';

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':firstName', $this->first_name);
        $stmt->bindParam(':lastName', $this->last_name);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':phone', $this->phone);

        // Execute query
        if ($stmt->execute()) {
            return true; // Registration successful
        } else {
            return false; // Registration failed
        }
    }
}
?>
