<?php
include 'Database.php';
include 'User.php';

class UserController {
    private $user;

    public function __construct() {
        // Initialize the UserAccounts object
        $this->user = new UserAccounts(); // Assuming the UserAccounts class handles its own database connection
    }

    public function loginUser($username, $password, $userType) {
        $stmt = $this->user->findUserByUsernameAndType($username, $userType);
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_type'] = $userType;

            switch ($userType) {
                case 'Admin':
                    header("location: adminDashboardBoundary.php");
                    break;
                case 'Agent':
                    header("location: REdashboard.php");
                    break;
                // Handle other user types with appropriate redirection
            }
            exit;
        } else {
            return "Invalid username or password.";
        }
    }
}
?>
