<?php
include("UserAccentity.php"); // Include the entity file
include("config.php");
// Instantiate the EditUserAccEntity class

// Check if form is submitted
class EditUserAccController 
{
    public function handleFormSubmission($conn) 
    {
        $editUserEntity = new UserEntity($conn);
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            // Get form data from the boundary
            $name = $_POST["name"];
            $userId = $_POST["user-id"];
            $password = $_POST["password"];
            $birthdate = $_POST["birthdate"];
            $address = $_POST["address"];
            $contact = $_POST["contact"];
            $profileType = $_POST["profile-type"];

    

    // Call the updateUser method to update the user account
            $result = $editUserEntity->updateUser($name, $userId, $password, $birthdate, $address, $contact, $profileType);

            // Handle the result of the update operation
            if ($result) {
                header("Location: dashboard.html");
                exit;// Redirect to a success page or display a success message
            } else {
                // Redirect to an error page or display an error message
            }
        }
    }    
}
// Instantiate the controller and handle form submission
$controller = new EditUserAccController();
$controller->handleFormSubmission($conn);
?>
