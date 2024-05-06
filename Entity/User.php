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
        $query = "SELECT users.* FROM users 
              JOIN user_profile ON users.ProfileID = user_profile.profile_id 
              WHERE users.username = ? AND user_profile.profile_type = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $username, $userType);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        return $user;
    }

    // This code block is for the main landing page which shows all accounts
    public function getAllUserAccounts() {
        $result = $this->conn->query("SELECT * FROM users");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
