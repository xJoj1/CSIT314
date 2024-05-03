<?php
include("userProfileEntity.php"); // Include the entity file
include("config.php");

class EditUserProfileController 
{
    private $conn; // Add a property to store the database connection

    // Constructor that accepts the database connection as an argument
    public function __construct($conn) 
    {
        $this->conn = $conn;
    }

    public function getUserProfiles() 
    {
        // Instantiate the UserProfileEntity class with the database connection
        $editUserProfileEntity = new UserProfileEntity($this->conn);

        // Call the method in the entity to fetch user profiles from the database
        return $editUserProfileEntity->getUserProfiles();
    }    
}

?>
