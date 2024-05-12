<?php
require_once '../../Entity/UserProfile.php';
// require_once '../../DBC/Database.php';

class createUserProfileController
{
    private $userProfile;

    public function __construct()
    {
        $this->userProfile = new UserProfile();
    }

    public function createProfile()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $profile_type = $_POST['profile_type'] ?? null;
            $description = $_POST['description'] ?? null;

            // Check for duplicate profiles
            if ($this->userProfile->isDuplicate($profile_type, $description)) {
                echo "<script>alert('Duplicate user profile is not allowed.'); window.location.href = 'viewUserProfileListUI.php';</script>";
                exit;
            }

            // Save profile if no duplicates
            $result = $this->userProfile->createUserProfile($profile_type, $description);
            $message = $result ? "Success" : "Failed to create profile.";
            echo "<script>alert('$message'); window.location.href = 'viewUserProfileListUI.php';</script>";
            exit;
        }
    }

}

?>