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

    // This code block is for the main landing page which shows all profile types
    public function getAllUserProfiles() {
        $result = $this->conn->query("SELECT * FROM user_profile");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // This is used to retrieve the Id
    public function getProfileById($profileId) {
        $stmt = $this->conn->prepare("SELECT * FROM user_profile WHERE profile_id = ?");
        $stmt->bind_param("i", $profileId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // This is for edit function
    public function updateProfile($profileId, $name, $description) {
        $stmt = $this->conn->prepare("UPDATE user_profile SET profile_type = ?, description = ? WHERE profile_id = ?");
        $stmt->bind_param("ssi", $name, $description, $profileId);
        $stmt->execute();
        return $stmt->affected_rows > 0;
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