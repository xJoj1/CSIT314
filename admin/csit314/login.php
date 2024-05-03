<?php 
include("config2.php");
include("logincontroller.php");
// Create a new instance of DBConnection
$dbConnection = new DBConnection();

// Get the database connection
$conn = $dbConnection->getConnection();

// Create an instance of LoginController and pass the database connection
$loginController = new LoginController($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Real Estate System</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Navigation Bar (Logged Out) -->
<nav class="navbar navbar-expand-sm navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Real Estate</a>

  <!-- Links -->
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="#">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Property</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Mortgage</a>
    </li>
  </ul>
  <!-- Right-aligned links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="#">Login</a>
    </li>
  </ul>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="login-container">
                <form action="logincontroller.php" method="POST">
                    <div class="form-group text-center">
                        <label><h1><b>Real Estate</b></h1></label>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label for="userType">User:</label>
                        </div>
                        <div class="col">
                            <select class="form-control" id="userType" name="userType">
                                <option>Admin</option>
                                <option>Buyer</option>
                                <option>Seller</option>
                                <option>Agent</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label for="loginID">Login ID:</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label for="password">Password:</label>
                        </div>
                        <div class="col">
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary btn-centered">Login</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

<!--
<footer class="container mt-4">
    <small>&copy; 2024 Real Estate Admin Panel</small>
</footer>
-->

</body>
</html>
