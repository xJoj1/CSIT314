<?php
require_once '../../Entity/UserProfile.php'; // Adjust this path to the correct location of your UserProfile model

class searchUserProfileController {

    private $userProfile;

    public function __construct() {

        $this->userProfile = new UserProfile();

    }

    public function searchUserProfile($searchTerm = '') {

        return $this->userProfile->searchUserProfile($searchTerm);

    }

}
?>