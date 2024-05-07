<?php
require_once '../../Entity/UserProfile.php'; 

class viewProfileListController {

    private $userProfile;

    public function __construct() {
        $this->userProfile = new UserProfile();
    }

    public function getAllProfiles() {
        return $this->userProfile->getAllUserProfiles();
    }

    public function getUserProfile($profileId) {

        return $this->userProfile->getUserProfile($profileId);

    }
}