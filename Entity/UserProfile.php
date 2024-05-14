<?php
require_once '../../DBC/Database.php';  // Ensure this path is correct

class UserProfile
{
    private $conn;
    private $table = 'user_profile';
    private $agentTable = 'agent';

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();

        if ($this->conn->connect_error) {

            die("Connection failed: " . $this->conn->connect_error);

        }
    }

    // FOR ALL EXISTING CODE, PLEASE DO NOT RENAME / REPLACE IT WITH YOUR OWN CODE BECAUSE IT MAY AFFECT OTHER WORKING FILES THANK YOU

    // This code block is for the main landing page which shows all profile types
    public function getAllUserProfiles(){
        $result = $this->conn->query("SELECT * FROM user_profile");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // This is used to retrieve the Id
    public function getProfileById($profileId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM user_profile WHERE profile_id = ?");
        $stmt->bind_param("i", $profileId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // This is used to retrieve the Id (For vicky code portion)
    public function getUserProfile($profileId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM user_profile WHERE profile_id = ?");
        $stmt->bind_param("i", $profileId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // This is for edit function
    public function updateProfile($profileId, $name, $description)
    {
        $stmt = $this->conn->prepare("UPDATE user_profile SET profile_type = ?, description = ? WHERE profile_id = ?");
        $stmt->bind_param("ssi", $name, $description, $profileId);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function createUserProfile($profile_type, $description) {

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

    public function searchUserProfile($searchTerm = '') {

        $searchTerm = "%$searchTerm%";
        $stmt = $this->conn->prepare("SELECT * FROM user_profile WHERE profile_type LIKE ? OR description LIKE ?");
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function suspendUserProfile($profileId)
    {
        $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET status = 'inactive' WHERE profile_id = ?");
        $stmt->bind_param("i", $profileId);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function updateProfileStatus($profileId, $status)
    {
        $stmt = $this->conn->prepare("UPDATE user_profile SET status = ? WHERE profile_id = ?");
        $stmt->bind_param("si", $status, $profileId);
        $stmt->execute();
        return $stmt->affected_rows > 0; // Returns true if the profile was updated
    }

    public function getAllActiveProfiles()
    {
        $sql = "SELECT * FROM user_profile WHERE status = 'active'";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllInActiveProfiles()
    {
        $sql = "SELECT * FROM user_profile WHERE status = 'inactive'";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function unsuspendUserProfile($profileId)
    {
        $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET status = 'active' WHERE profile_id = ?");
        $stmt->bind_param("i", $profileId);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    // New methods for handling agent data:
    public function getAllAgents() {
        $sql = "SELECT * FROM " . $this->agentTable;
        $result = $this->conn->query($sql);
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            die("Error retrieving agents: " . $this->conn->error);
        }
    }

    public function getAgentById($agentId) {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->agentTable . " WHERE agent_id = ?");
        $stmt->bind_param("i", $agentId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

}