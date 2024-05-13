<?php
require_once '../../Entity/User.php';
require_once '../../Entity/UserProfile.php';

class EditUserAccountController {
    private $userEntity;
    private $userProfileEntity;

    public function __construct() {
        $this->userEntity = new User();
        $this->userProfileEntity = new UserProfile();
    }

    public function handleRequest() {
        // echo '<pre>';
        //     var_dump($_POST); // Dump all POST data to see what is received.
        // echo '</pre>';
        $profileTypes = $this->userProfileEntity->getAllUserProfiles(); // Fetch all profile types

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Check if the profile type is set and not empty
            if (!isset($_POST['profile_type']) || empty($_POST['profile_type'])) {
                return ['message' => 'Profile type is required.', 'profileTypes' => $profileTypes];
            }
        
            // Proceed with the update if valid
            $response = $this->updateUser();
            $response['profileTypes'] = $profileTypes; 
            return $response;
        }

        if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
            $user = $this->userEntity->findUserById($_GET['user_id']);
            if ($user) {
                return ['user' => $user,'profileTypes' => $profileTypes];
            } else {
                return ['message' => "No user found with ID: " . $_GET['user_id'], 'profileTypes' => $profileTypes];
            }
        }

        return ['message' => 'No user ID provided.', 'profileTypes' => $profileTypes];
    }

    private function updateUser() {
        $userId = $_POST['user_id'];
        $name = $_POST['name'];
        $password = $_POST['password']; // Consider hashing this password.
        $birthdate = $_POST['birthdate'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $profileTypeId = $_POST['profile_type']  ?? null;

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 

        $success = $this->userEntity->updateUserDetails($userId, $name, $hashedPassword, $birthdate, $address, $contact, $profileTypeId);
        if ($success) {
            header("Location: viewUserAccountListUI.php?message=Update Successful");
            exit;
        }

        return ['message' => 'Failed to update user.'];
    }
}
?>