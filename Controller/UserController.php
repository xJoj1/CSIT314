<?php
include_once 'DBC/Database.php';
include_once 'Entity/User.php';
include_once '../../login.php';

class UserController {
    private $user;

    public function __construct() {
        $this->user = new User(); // Assuming the User class handles its own database connection
    }

    public function loginUser($username, $password, $userType) {
        try {
            $stmt = $this->user->findUserByUsernameAndType($username, $userType);
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            // Since passwords are not hashed, compare them directly
            if ($user && $password === $user['password']) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['user_type'] = $userType;

                // Redirect based on user type
                switch ($userType) {
                    case 'Admin':
                        header("location: adminDashboard.php");
                        exit;
                    case 'Agent':
                        header("location: REdashboard.php");
                        exit;
                    // Add other cases as needed
                }
            } else {
                throw new Exception("Invalid username or password.");
            }
        } catch (Exception $e) {
            // Optionally log the error and then return or handle it
            return $e->getMessage(); // For debugging, might use a user-friendly message in production
        }
    }
}
