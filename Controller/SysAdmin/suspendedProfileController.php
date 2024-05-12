<?php
require_once '../../Entity/UserProfile.php'; 

class suspendedProfileController {

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

    public function getAllInActiveProfiles(){
        return $this->userProfile->getAllInActiveProfiles();
    }

    public function getUserProfile($profileId) {

        return $this->userProfile->getUserProfile($profileId);

    }

    public function unsuspendUserProfile($profileId){
  
        return $this->userProfile->updateProfileStatus($profileId, 'active');
    }
}