<?php
include("config.php");

class UserProfileEntity {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getUserProfiles() {
        // Query to fetch user profiles from the database
        $sql = "SELECT * FROM user_profile"; // Fetch all fields for the user profiles
        $result = $this->conn->query($sql);

        $userProfiles = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $userProfiles[] = $row;
            }
        }

        return $userProfiles;
    }
    public function createNewUserProfile($username, $role, $description) {
        // You can modify the SQL query based on your database schema
        $sql = "INSERT INTO user_profile (uname, utype, description) VALUES ('$username', '$role', '$description')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            // Error handling if the query fails
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
    }
}
?>
