<?php
require_once '../../Entity/UserProfile.php';
require_once '../../DBC/Database.php';

class createUserProfileController
{
    private $userProfile;

    public function __construct()
    {
        $database = new Database();  // Assumes the Database class has a method to get a connection
        $this->userProfile = new UserProfile($database);
    }

    public function createProfile($profile)
    {
        $profile_type = $profile['profile_type'];
        $description = $profile['description'];

        // Check for duplicate profiles
        if ($this->userProfile->isDuplicate($profile_type, $description)) {
            return "Duplicate user profile is not allowed.";
        }

        // Save profile if no duplicates
        $result = $this->userProfile->createUserProfile($profile_type, $description);
        if ($result) {
            return "Success";
        } else {
            return "Failed to create profile.";
        }
    }

}

?>