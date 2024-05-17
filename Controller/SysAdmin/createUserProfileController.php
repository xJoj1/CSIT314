<?php
require_once '../../Entity/UserProfile.php';

class createUserProfileController
{
    private $userProfile;
    public $message = '';

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
                $this->message = 'Duplicate user profile is not allowed.';
                header("Location: createUserProfileUI.php?message=" . urlencode($this->message));
                exit;
            }

            // Save profile if no duplicates
            $result = $this->userProfile->createUserProfile($profile_type, $description);
            $this->message = $result ? "Profile created successfully." : "Failed to create profile.";
            header("Location: createUserProfileUI.php?message=" . urlencode($this->message));
            exit;
        }
    }
}


?>