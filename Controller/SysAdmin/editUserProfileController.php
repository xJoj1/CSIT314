<?php
require_once '../../Entity/UserProfile.php';

class EditUserProfileController {
    private $userProfile;

    public function __construct() {
        $this->userProfile = new UserProfile();
    }

    public function getProfile($profileId) {
        $result = $this->userProfile->getProfileById($profileId);
        if (!$result) {
            error_log("No profile found for ID: " . $profileId);
        }
        return $result;
    }

    public function updateProfile($profileId, $name, $description) {
        return $this->userProfile->updateProfile($profileId, $name, $description);
    }
}