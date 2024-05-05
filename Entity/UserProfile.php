<?php
require_once '../../DBC/Database.php';  // Ensure this path is correct

class UserProfile
{
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
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
}