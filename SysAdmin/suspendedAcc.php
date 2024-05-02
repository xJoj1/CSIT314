<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Suspended User's List</title>
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
          <a class="nav-link" href="userAccounts.php">User Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="userProfile.php">User Profiles</a>
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

    <!-- Suspend List -->
    <div class="container mt-5">

        <h1><b>Suspended User Accounts</b></h1>

        <!-- Main Body (List) -->
        <div class="suspend-container">
            <div class="selectAll">
                <!-- Need backend to do up a function to check all other checkboxes-->
                <input class="checkbox" type="checkbox" id="select-all-users" name="select-all-users">
                <p><b>Select All Users</b></p>
                <button id="unsuspendUser" type="unSuspendUser">Unsuspend User</button>

            </div>
            <div class="suspendList">
                <div class="checkbox">
                    <input class="chkbx" type="checkbox" id="tuser1" name="checkbox1">
                    <p>Test User 1</p>
                </div>
                <div class="checkbox">
                    <input class="chkbx" type="checkbox" id="tuser3" name="checkbox1">
                    <p>Test User 3</p>
                </div> 

            </div>
        </div><br>
        <!-- Back Button -->
        <a id="back" href="userAccounts.php" class="btn btn-secondary" role="button">Back</a>
        </div>
    </div>

    <script>
    // Checking of all checkbox
    document.addEventListener('DOMContentLoaded', function () {
        var selectAllCheckbox = document.getElementById('select-all-users');
        selectAllCheckbox.addEventListener('change', function (e) {
        var allCheckboxes = document.querySelectorAll('.chkbx');
        allCheckboxes.forEach(function (checkbox) {
            checkbox.checked = e.target.checked;
        });
        });
    });
    </script>

  </body>
</html>