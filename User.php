<?php
include_once 'Database.php';

class User {
    private $conn;
    private $table_name = "users";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection(); // Get the database connection
    }

    public function findUserByUsernameAndType($username, $userType) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = ? AND user_type = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $username, $userType);
        $stmt->execute();
        return $stmt;
    }
}

?>
