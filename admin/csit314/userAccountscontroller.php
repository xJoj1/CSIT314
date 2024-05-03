<?php
require_once 'UserAccentity.php';
include ("config.php");
class UserController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getUserList() {
        $userEntity = new UserEntity($this->conn);
        return $userEntity->getAllUsers();
    }
    public function searchUsers($searchQuery) {
        $userEntity = new UserEntity($this->conn);
        $userNames = $userEntity->searchUsers($searchQuery);
    
        // Generate HTML content for search results
        $html = '<div>';
        foreach ($userNames as $userName) {
            $html .= '<div class="checkbox">';
            $html .= '<input class="chkbx" type="checkbox" id="' . $userName . '" name="checkbox1">';
            $html .= '<p>' . $userName . '</p>';
            $html .= '</div>';
        }
        $html .= '</div>';
    
        return $html;
    }
    public function suspendUser($userName) {
        $userEntity = new UserEntity($this->conn);
        return $userEntity->suspendUser($userName);
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the action is to suspend users
    if (isset($_POST['action']) && $_POST['action'] === 'suspend') {
        // Check if usernames to suspend are provided
        if (isset($_POST['usernames'])) {
            $usernames = json_decode($_POST['usernames'], true);

            // Create an instance of UserController
            $controller = new UserController($conn);

            // Suspend each user
            foreach ($usernames as $username) {
                $success = $controller->suspendUser($username);
                if (!$success) {
                    // Handle suspension failure
                    echo 'error';
                    exit(); // Stop further execution
                }
            }

            // All users suspended successfully
            echo 'success';
            exit(); // Stop further execution
        } else {
            // No usernames provided
            echo 'error';
            exit(); // Stop further execution
        }
    }
}
?>
