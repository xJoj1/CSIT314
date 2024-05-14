<?php
require_once '../../Entity/User.php';

class CreateUserAccountController {
    private $userEntity;

    public function __construct() {
        $this->userEntity = new User();
        $this->__cons();
    }

    private function createUser() {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;
        $birthdate = $_POST['birthdate'] ?? null;
        $address = $_POST['address'] ?? null;
        $contact = $_POST['contact'] ?? null;
        $profileTypeId = $_POST['profile-type'] ?? null;

        if (empty($username) || empty($password) || empty($birthdate) || empty($address) || empty($contact) || empty($profileTypeId)) {
            header('Location: createUserAccountUI.php?error=Missing required fields');
            exit;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $success = $this->userEntity->createUser($username, $hashedPassword, $birthdate, $address, $contact, $profileTypeId);

        if ($success) {
            header('Location: viewUserAccountListUI.php?success=User created successfully');
            exit;
        } else {
            header('Location: createUserAccountUI.php?error=Failed to create user');
            exit;
        }
    }

    private $userProfile;

    public function __cons() {
        $this -> userProfile = new UserProfile();
    }

    public function handleRequest() {
        $profileTypes = $this->userProfile->getAllUserProfiles(); // Fetch all profile types

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->createUser();
        } else {
            return ['profileTypes' => $profileTypes];
        }
    }
}

require_once '../../Entity/UserProfile.php';
?>