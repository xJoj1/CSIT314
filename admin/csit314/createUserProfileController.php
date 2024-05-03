<?php
include("config.php");
include("userProfileEntity.php");

class CreateUserProfileController {
    private $entity;

    public function __construct($conn) {
        $this->entity = new UserProfileEntity($conn);
    }

    public function createUserProfile($username, $role, $description) {
        // Call the createNewUserProfile method from the entity
        return $this->entity->createNewUserProfile($username, $role, $description);
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Instantiate the controller
    $controller = new CreateUserProfileController($conn);

    // Extract form data
    $username = $_POST["name"];
    $role = $_POST["role"];
    $description = $_POST["description"];

    // Call the createUserProfile method from the controller
    $result = $controller->createUserProfile($username, $role, $description);

    // Handle the result as needed
    if ($result) {
        // Success message or redirect to success page
        echo "User profile created successfully!";
    } else {
        // Error message or redirect to error page
        echo "Failed to create user profile.";
    }
}
?>
