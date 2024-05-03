<?php
include("config.php"); // Assuming this file contains database connection details

class UserEntity {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function createUser($name, $userId, $password, $birthdate, $address, $contact, $profileType) {
    
        // Prepare the SQL statement to insert a new user into the database
        $sql = "INSERT INTO user (uname, uid, upass, birthdate, address, uphone, utype) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        // Prepare the statement
        $stmt = $this->conn->prepare($sql);
    
        // Bind parameters
        $stmt->bind_param("sssssss", $name, $userId, $password, $birthdate, $address, $contact, $profileType);
    
        // Execute the statement
        $result = $stmt->execute();
    
        // Check if the insertion was successful
        if ($result) {
            return true; // User created successfully
        } else {
            return false; // User creation failed
        }
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
    public function getAllUsers()
    {
        $query = "SELECT uname FROM user";
        $result = $this->conn->query($query);

        $users = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
        return $users;
    }
    public function searchUsers($searchQuery) {
        // Debugging: Print the received search query
        echo "Received search query: " . $searchQuery . "<br>";
    
        // Prepare the SQL statement to search for users based on the provided query
        $sql = "SELECT uname FROM user WHERE uname LIKE ?";
        
        // Append wildcard characters to the search query to perform a partial match
        $searchParam = "%{$searchQuery}%";
        
        // Debugging: Print the constructed SQL query
        echo "SQL query: " . $sql . "<br>";
    
        // Prepare and execute the SQL statement
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $searchParam);
        $stmt->execute();
        
        // Bind the result
        $stmt->bind_result($userName);
        
        // Fetch the results into an array
        $userNames = [];
        while ($stmt->fetch()) {
            $userNames[] = $userName;
        }
        
        // Close the statement
        $stmt->close();
        
        // Debugging: Print the retrieved user names
        echo "Retrieved user names: ";
        print_r($userNames);
        
        return $userNames;
    }
    public function suspendUser($username) {
        // Prepare the SQL statement to update the suspend status of the user
        $sql = "UPDATE user SET suspend = 'yes' WHERE uname = ?";
        
        // Prepare the statement
        $stmt = $this->conn->prepare($sql);
    
        // Bind parameters
        $stmt->bind_param("s", $username);
    
        // Execute the statement
        $result = $stmt->execute();
    
        // Check if the update was successful
        if ($result) {
            return true; // User suspended successfully
        } else {
            return false; // User suspension failed
        }
    }
    public function getSuspendedUsers() {
        $query = "SELECT * FROM user WHERE suspend = 'yes'";
        $result = $this->conn->query($query);

        $suspendedUsers = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $suspendedUsers[] = $row;
            }
        }
        return $suspendedUsers;
    }

    public function unsuspendUser($username) {
        // Prepare the SQL statement to update the suspend status of the user
        $sql = "UPDATE user SET suspend = 'no' WHERE uname = ?";
        
        // Prepare the statement
        $stmt = $this->conn->prepare($sql);
    
        // Bind parameters
        $stmt->bind_param("s", $username);
    
        // Execute the statement
        $result = $stmt->execute();
    
        // Check if the update was successful
        if ($result) {
            return true; // User unsuspended successfully
        } else {
            return false; // User unsuspension failed
        }
    }
    public function getUserDetails($username) {
        // Prepare the SQL statement to select user details based on username
        $sql = "SELECT * FROM user WHERE uname = ?";

        // Prepare the statement
        $stmt = $this->conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("s", $username);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Check if user details are found
        if ($result->num_rows > 0) {
            // Fetch user details as an associative array
            $userDetails = $result->fetch_assoc();
            return $userDetails;
        } else {
            // Return null if user details are not found
            return null;
        }
    }
    
}

?>
