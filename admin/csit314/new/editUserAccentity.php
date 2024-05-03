<?php
include("config.php"); // Include the config file for database connection

class EditUserAccEntity {
    private $conn; // Database connection object

    // Constructor to initialize the database connection
    public function __construct($conn) {
     // Access the global $con variable from config.php
        $this->conn = $conn; // Assign the database connection to the private $conn property
    }

    // Method to update user account
    public function updateUser($name, $userId, $password, $birthdate, $address, $contact, $profileType) 
    {
        // Prepare SQL statement to update user account
        $sql = "UPDATE user SET uname=?, upass=?, birthdate=?, address=?, uphone=?, utype=? WHERE uid=?";

        // Prepare the statement
        $stmt = $this->conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("sssssss", $name, $password, $birthdate, $address, $contact, $profileType, $userId);

        // Execute the statement
        $result = $stmt->execute();

        // Check if the update was successful
        if ($result) {
            return true;
             // Make sure to exit after the header redirection// Return true if update was successful
        } else {
            return false; // Return false if update failed
        }
    }
}
?>
