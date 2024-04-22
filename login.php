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
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="introPage.php">Real Estate</a>

  <!-- Links -->
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="introPage.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"></a>
    </li>
  </ul>
  <!-- Right-aligned links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="login.php">Login</a>
    </li>
  </ul>
</nav>

<div class="container mt-5">
    <div class="login-container">
        <h1>Real Estate</h1>
        <form id="login-form" action="adminDashboard.php">
            <div class="form-group" >
                <div class="row">
                    <div class="col-3">
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
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-3">
                        <label for="loginID">Login ID:</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="loginID" name="loginID" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-3">
                        <label for="password">Password:</label>
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
            </div>
            <div class="form-group mt-5">
                <div class="row">
                    <div class="col-3 m-auto">
                    <button type="submit" class="btn btn-primary btn-block" onclick="login()">Login</button>
                </div>
        </form>
    </div>
</div>

<script>
    function login() {
        var loginID = document.getElementById("loginID").value;
        var password = document.getElementById("password").value;

        // Simulate basic login verification
        if (loginID === "admin" && password === "admin") {
            // Redirect to dashboard.html
            window.location.href = "dashboard.html";
        } else {
            alert("Invalid login credentials. Please try again.");
        }
    }
</script>

</body>
</html>
