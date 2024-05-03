<?php
include_once 'Entity/User.php';

class UserController {
    private $user;

    public function __construct() {
        $this->user = new User(); // Create a new instance of the User class
    }

    public function loginUser($username, $password, $userType) {
        $user = $this->user->findUserByUsernameAndType($username, $userType);

        if ($user && $password === $user['password']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_type'] = $userType;

            switch ($userType) {
                case 'Admin':
                    header("location: Boundary/SysAdmin/adminDashboard.php");
                    exit;
                case 'Agent':
                    header("location: Boundary/REagent/REdashboard.php");
                    exit;
                case 'Buyer':
                    header("location: Boundary/Buyer/buyerDashboard.php");
                    exit;
                case 'Seller':
                    header("location: sellerDashboard.php");
                    exit;
                default:
                    return "Access Denied: Unknown user type.";
            }
        } else {
            return "Invalid username or password.";
        }
    }
}
?>
