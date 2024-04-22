<?php
include("createUserAccEntity.php");
include("config.php");

// Instantiate the User Entity object
$userEntity = new UserEntity($conn);

// Check if the request is a POST, ensuring it's a form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = htmlspecialchars($_POST["name"]);
    $userId = htmlspecialchars($_POST["user-id"]);
    $password = htmlspecialchars($_POST["password"]);
    $birthdate = htmlspecialchars($_POST["birthdate"]);
    $address = htmlspecialchars($_POST["address"]);
    $contact = htmlspecialchars($_POST["contact"]);
    $profileType = htmlspecialchars($_POST["profile-type"]);

    // Encrypt the password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Call the entity method to create the user
    $result = $userEntity->createUser($name, $userId, $password, $birthdate, $address, $contact, $profileType);

    // Redirect or display an error message based on the result
    if ($result) {
        header("Location: dashboard.html");
        exit; // Redirect to dashboard after successful creation
    } else {
        // User creation failed, return an error message
        echo "Failed to create user. Please try again.";
    }
}

// Security enhancements: add HTTP headers to prevent XSS and other attacks
header("X-Content-Type-Options: nosniff");
header("X-XSS-Protection: 1; mode=block");
header("X-Frame-Options: DENY");

?>
