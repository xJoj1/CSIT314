<?php
require_once '../../Entity/UserProfile.php'; 

class viewUserProfileListController {

    private $userProfile;

    public function __construct() {
        $this->userProfile = new UserProfile();
    }

    public function getAllProfiles() {
        return $this->userProfile->getAllUserProfiles();
    }

    public function getAllActiveProfiles(){
        return $this->userProfile->getAllActiveProfiles();
    }

    public function getUserProfile($profileId) {

        return $this->userProfile->getUserProfile($profileId);

    }
}