<?php
include_once '../../DBC/Database.php';

class User {
    private $conn;
    private $table_name = "users";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        if ($this->conn->connect_errno) {
            die("Failed to connect to MySQL: " . $this->conn->connect_error);
        }
    }

    // FOR ALL EXISTING CODE, PLEASE DO NOT RENAME / REPLACE IT WITH YOUR OWN CODE BECAUSE IT MAY AFFECT OTHER WORKING FILES THANK YOU

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

    public function findUserById($userId) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        return $user;
    }

    public function updateUserDetails($userId, $username, $password, $birthdate, $address, $contact, $profileId) {
        $query = "UPDATE users SET username = ?, password = ?, birthdate = ?, address = ?, contact = ?, ProfileID = ? WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            error_log('Prepare failed: ' . $this->conn->error);
            return false;
        }
    
        $stmt->bind_param("sssssii", $username, $password, $birthdate, $address, $contact, $profileId, $userId);
        if (!$stmt->execute()) {
            error_log('Execute failed: ' . $stmt->error);
            return false;
        }
    
        return $stmt->affected_rows > 0;
    }
    // for form dropdown (profile_type)
    public function getUserById($userId) {
        $query = "SELECT users.*, user_profile.profile_type 
                  FROM users 
                  JOIN user_profile ON users.ProfileID = user_profile.profile_id 
                  WHERE users.user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Method to create a new user in the database
    public function createUser($username, $password, $birthdate, $address, $contact, $profileTypeId) {
        $query = "INSERT INTO " . $this->table_name . " (username, password, birthdate, address, contact, ProfileID) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            error_log("Prepare failed: " . $this->conn->error);
            return false;
        }
    
        $stmt->bind_param("sssssi", $username, $password, $birthdate, $address, $contact, $profileTypeId);
        if (!$stmt->execute()) {
            error_log("Execute failed: " . $stmt->error);
            return false;
        }
        return true;
    }

    // Suspended User Account 
    public function getUserByName($searchTerm = '')
    {
        $searchTerm = "%$searchTerm%";
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username LIKE ?");
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserByID2($searchTerm = '')
    {
        $searchTerm = "%$searchTerm%";
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE user_id LIKE ?");
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function suspendUser($userId)
    {
        $stmt = $this->conn->prepare("UPDATE users SET status = 'inactive' WHERE user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function suspendUserList($userList)
    {
        foreach ($userList as $user) {
            $userId = $user['userId'];
            $suspendResult = $this->suspendUser($userId);
            if (!$suspendResult) {
                return false;
            }
        }
        return true;
    }


    public function unSuspendUser($userId)
    {
        $stmt = $this->conn->prepare("UPDATE users SET status = 'active' WHERE user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function usSuspendUserList($userList)
    {
        foreach ($userList as $user) {
            $suspendResult = $this->unSuspendUser($user);
            if (!$suspendResult) {
                return false;
            }
        }
        return true;
    }

    public function getSuspendedUserAccounts()
    {
        $result = $this->conn->query("SELECT * FROM users WHERE status = 'inactive' ");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
