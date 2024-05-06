<?php
include_once 'Controller/LoginController.php';

session_start(); // Start session at the very beginning

$userController = new UserController();

$login_err = ""; // Initialize an error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['loginID'];
    $password = $_POST['password'];
    $profileType = $_POST['userType'];
    
    // Debug output
    error_log("Username: $username, Password: $password, UserType: $profileType");
    
    $login_err = $userController->loginUser($username, $password, $profileType);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Real Estate System</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="introPage.php">Real Estate</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
        </li>
    </ul>
</nav>

<div class="container mt-5">
    <div class="login-container">
        <h1>Login</h1>
        <?php if ($login_err != "") echo '<div class="alert alert-danger">' . $login_err . '</div>'; ?>
        <form id="login-form" method="POST" action="login.php">
            <div class="form-group">
                <label for="userType">User:</label>
                <select class="form-control" id="userType" name="userType">
                    <option>Admin</option>
                    <option>Buyer</option>
                    <option>Seller</option>
                    <option>Agent</option>
                </select>
            </div>
            <div class="form-group">
                <label for="loginID">Login ID:</label>
                <input type="text" class="form-control" id="loginID" name="loginID" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
</body>
</html>
