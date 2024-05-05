<?php
include_once 'DBC/Database.php';

class User {
    private $conn;
    private $table_name = "users";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function findUserByUsernameAndType($username, $userType) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = ? AND profile_type = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $username, $userType);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // This code block is for the main landing page which shows all accounts
    public function getAllUserAccounts() {
        $result = $this->conn->query("SELECT * FROM users");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
