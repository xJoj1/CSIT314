<?php
require_once '../../Entity/UserProfile.php';
require_once '../../DBC/Database.php';

class createUPController
{
    private $userProfile;

    public function __construct()
    {
        $database = new Database();  // Assumes the Database class has a method to get a connection
        $this->userProfile = new UserProfile($database);
    }

    public function createUserProfile($formData)
    {
        $profile_type = $formData['profile_type'];
        $description = $formData['description'];

        // Validate data
        if (!$this->validateData($profile_type, $description)) {
            return "Validation failed. Please check input data.";
        }

        // Check for duplicate profiles
        if ($this->userProfile->isDuplicate($profile_type, $description)) {
            return "Duplicate user profile is not allowed.";
        }

        // Save profile if no duplicates
        $result = $this->userProfile->addUserProfile($profile_type, $description);
        if ($result) {
            return "Success";
        } else {
            return "Failed to create profile.";
        }
    }


    private function validateData($profile_type, $description)
    {

        // Implement validation logic here
        return true; // Simplified for example purposes

    }

}

?>