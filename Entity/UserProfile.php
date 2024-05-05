<?php
require_once '../../DBC/Database.php';  // Ensure this path is correct

class UserProfile
{
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllUserProfiles() {
        $result = $this->conn->query("SELECT * FROM user_profile");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}