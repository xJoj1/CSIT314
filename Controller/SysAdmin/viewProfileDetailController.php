<?php
require_once '../../Entity/UserProfile.php';

class viewProfileDetailController {

    private $userProfile;

    public function __construct() {

        $this->userProfile = new UserProfile();

    }

    public function getProfiles() {
        if (!isset($_GET['profile_ids'])) {
            header('Location: viewUserProfileListUI.php'); // Redirect if no profile IDs are given
            exit;
        }

        $profileIds = explode(',', $_GET['profile_ids']);
        $profiles = [];
        foreach ($profileIds as $profileId) {
            $profile = $this->getUserProfile($profileId);
            if ($profile) {
                $profiles[] = $profile;
            }
        }
        return $profiles;
    }

    public function getUserProfile($profileId) {

        return $this->userProfile->getUserProfile($profileId);

    }
    
    
}