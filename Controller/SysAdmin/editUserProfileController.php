<?php
require_once '../../Entity/UserProfile.php';

class EditUserProfileController {
    private $userProfile;

    public function __construct() {
        $this->userProfile = new UserProfile();
    }

    public function handleRequest() {
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return $this->updateProfile();
        }

        if (isset($_GET['profile_id']) && !empty($_GET['profile_id'])) {
            return $this->getProfileForEditing($_GET['profile_id']);
        } else {
            $message = "No Profile ID provided.";
        }

        return ['message' => $message];
    }

    private function getProfileForEditing($profileId) {
        $result = $this->userProfile->getProfileById($profileId);
        if (!$result) {
            error_log("No profile found for ID: " . $profileId);
            return ['message' => "Profile data is not available."];
        }
        return ['profile' => $result];
    }

    private function updateProfile() {
        $profileId = $_POST['profile_id'];
        $name = $_POST['profile_type'];
        $description = $_POST['description'];

        $success = $this->userProfile->updateProfile($profileId, $name, $description);
        $message = $success ? "Profile updated successfully." : "Failed to update profile.";

        if ($success) {
            header("Location: viewUserProfileListUI.php");
            exit;
        }

        return ['message' => $message];
    }
}