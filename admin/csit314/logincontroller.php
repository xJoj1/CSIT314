<?php
require_once("loginentity.php");

class LoginController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function loginUser($username, $password, $usertype) {
        $loginEntity = new loginEntity($this->conn);
        $ra_id = $loginEntity->validateLogin($username, $password, $usertype);
        if ($ra_id) {
            session_start();
            $_SESSION['uid'] = $ra_id;
            
            switch ($usertype) {
                case "Admin":
                    header("Location: dashboard.html");
                    break;
                case "Buyer":
                    header("Location: buyerDashboard.php");
                    break;
                case "Seller":
                    header("Location: sellerDashboard.php");
                    break;
                case "Agent":
                    header("Location: agentDashboard.php");
                    break;
                default:
                    // Handle unknown user types
                    header("Location: unknownUserDashboard.php");
                    break;
            }
    
            exit();
        } else {
            // Handle invalid login
            echo "Invalid username or password or your account has been suspended";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = $_POST['userType'];
    
    $dbConnection = new DBConnection();
    $conn = $dbConnection->getConnection();

    $loginController = new LoginController($conn);
    $loginController->loginUser($username, $password, $usertype);
}
?>
