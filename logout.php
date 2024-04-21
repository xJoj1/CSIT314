<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logged Out</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Navigation Bar (Logged Out) -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
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
        <a class="nav-link" href="login.html">Login</a>
      </li>
    </ul>
</nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="alert alert-success" role="alert">
                <h4>You have been logged out, have a nice day!</h4>
            </div>
            <a href="login.html" class="btn btn-secondary">Back to Login</a>
            <a href="#" class="btn btn-secondary">To Home</a>
        </div>
    </div>
</div>

</body>
</html>
