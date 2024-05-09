<?php
require_once '../../Entity/UserProfile.php'; // Adjust the path to where your UserProfile class is located

class SuspendUserProfileController
{
    private $userProfile;

    public function __construct()
    {
        $this->userProfile = new UserProfile();
    }

    public function getProfileById($profileId)
    {
        // Assuming getProfileById returns profile data or null if not found
        return $this->userProfile->getProfileById($profileId);
    }

    public function suspendUserProfile($profileId)
    {
        // Assuming suspendUserProfile updates the 'status' to 'inactive'
        // Returns true on success, false on failure
        return $this->userProfile->updateProfileStatus($profileId, 'inactive');
    }
}
