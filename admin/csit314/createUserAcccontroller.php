<?php
include("UserAccentity.php");
include("config.php");

class UserAccController {
    private $userEntity;

    public function __construct($conn) {
        $this->userEntity = new UserEntity($conn);
    }

    public function createUser() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form data from the boundary
            $name = $_POST["name"];
            $userId = $_POST["user-id"];
            $password = $_POST["password"];
            $birthdate = $_POST["birthdate"];
            $address = $_POST["address"];
            $contact = $_POST["contact"];
            $profileType = $_POST["profile-type"];

            // Call the createUser method to add the new user to the database
            $result = $this->userEntity->createUser($name, $userId, $password, $birthdate, $address, $contact, $profileType);

            if ($result) {
                header("Location: dashboard.html");
                exit; // Make sure to exit after the header redirection
            } else {
                // User creation failed
                // Redirect or show error message
            }
        }
    }
}

// Create an instance of the controller
$controller = new UserAccController($conn);
// Call the createUser method
$controller->createUser();

?>
