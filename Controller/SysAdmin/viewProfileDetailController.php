<?php
require_once '../../Entity/UserProfile.php';

class viewProfileDetailController {

    private $userProfile;

    public function __construct() {

        $this->userProfile = new UserProfile();

    }

    public function getAllProfiles() {

        return $this->userProfile->getAllUserProfiles();

    }

    public function getProfileById($profileId) {

        return $this->userProfile->getProfileById($profileId);

    }
    
}