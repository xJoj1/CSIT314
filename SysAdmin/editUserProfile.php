<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Edit/Modify</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Navigation Bar (Logged In) -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="adminDashboard.php">Real Estate</a>

  <!-- Links -->
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="adminDashboard.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="userAccounts.php">User Accounts</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="userAccMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            User Profile
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
            <a class="dropdown-item" href="suspendedProfile.php">Suspended Profiles</a>
        </div>
      </li>
  </ul>
  <!-- Right-aligned dropdown for admin options -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Welcome Admin
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
        <a class="dropdown-item" href="#">Profile</a>
        <a class="dropdown-item" href="logout.php">Logout</a> <!-- Link to logout.html -->
      </div>
    </li>
  </ul>
</nav>

<!-- End of nav bar-->

<div class="container mt-5">
    <div class="create-container">
        <a href="userProfile.php" class="back-arrow">‹</a>
        <h2>Edit User Profile</h2>
        <form id="profileForm" onsubmit="return validateForm()">
            <div class="form-group2">
                <div class="row">
                  <div class="col-3">
                      <label for="name">Name:</label>
                  </div>
                  <div class="col">
                      <input readonly type="text" id="name" value="Gary">
                  </div>
              </div>
            </div>

            <div class="form-group2">
                <div class="row">
                  <div class="col-3">
                      <label for="role">Role:</label>
                  </div>
                  <div class="col">
                      <!-- Value here should reflect database value-->
                      <input readonly type="text" id="name" value="Buyer">
                  </div>
              </div>
            </div>

            <div class="form-group2">
              <div class="row">
                  <div class="col-3">
                      <label for="description">Description:</label>
                  </div>
                  <div class="col">
                      <textarea id="description" class="form-control"></textarea>
                  </div>
              </div>
              <div class="row">
                  <div class="col-3">
                      <label></label>
                  </div>
                  <div class="col">
                      <div class="col" id="descriptionError" class="error-message"></div>
                  </div>
              </div>
            </div>          
          
            <div class="form-group2 mt-5">
              <div class="row">
                  <div class="col-3 m-auto">
                      <button type="submit" class="btn-primary btn-block">Confirm</button>
                  </div>
              </div>
            </div>
        </form>
    </div>
</div>


  <script>
      function validateForm() {
          var userId = document.getElementById("description").value;
     
          var isValid = true;

          if (userId === "") {
              document.getElementById("descriptionError").innerHTML = "Please enter a description";
              isValid = false;
          } else {
              document.getElementById("descriptionError").innerHTML = "";
          }

          return isValid;
      }
  </script>
  
</body>
</html>