<?php
require_once '../../DBC/Database.php';  // Ensure this path is correct

class UserProfile
{
    private $conn;
    private $table = 'user_profile';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();

        if ($this->conn->connect_error) {

            die("Connection failed: " . $this->conn->connect_error);

        }
    }

    public function getAllUserProfiles() {
        $result = $this->conn->query("SELECT * FROM user_profile");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addUserProfile($profile_type, $description) {

        $query = "INSERT INTO " . $this->table . " (profile_type, description) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss', $profile_type, $description);

        if ($stmt->execute()) {

            return true;

        } else {
            
            error_log('SQL Error: ' . $stmt->error);
            return false;

        }

    }

    public function isDuplicate($profile_type, $description) {

        $query = 'SELECT profile_id FROM ' . $this->table . ' WHERE profile_type = ? AND description = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss', $profile_type, $description);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;

    }

}