<?php 
include("userProfileController.php");
include("config.php");
$controller = new EditUserProfileController($conn);
$userNames = $controller->getUserProfiles();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suspend Users</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>
<body>

<!-- Navigation Bar (Logged In) -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="dashboard.html">Real Estate</a>
  
    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.html">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="userAccounts.html">User Accounts</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="userAccMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            User Profile
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
            <a class="dropdown-item" href="suspendedProfile.html">Suspended Profiles</a>
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
          <a class="dropdown-item" href="logout.html">Logout</a> <!-- Link to logout.html -->
        </div>
      </li>
    </ul>
</nav>

<!-- Account List -->
<div class="container AccContain mt-5">
    <!-- Alert bar -->
    <div class="suspendalert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Profile suspended successfully
    </div>

    <!-- Search Bar -->
    <div class="search-container">
        
        <div class="user-buttons">
            <a href="createUserProfile.html" class="button">Create Profile</a>
            <a href="editUserProfile.php" class="button">Edit Profile</a>
            <a href="viewProfile.html" class="button">View Profile</a>
            <a onclick="showSuspendConfirmation()" class="button">Suspend Profile</a>
        </div>
    </div>

    <!-- Main Body (List) -->
    <div class="suspend-container">
    <div class="selectAll">
        <!-- Need backend to do up a function to check all other checkboxes-->
        <input class="checkbox" type="checkbox" id="select-all-users" name="select-all-users">
        <p><b>Select All Users</b></p>
    </div>
    <div class="suspendList">
        <table class="cell-border stripe" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Select</th> <!-- Added th for the checkbox column -->
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Display user names received from the controller
                    foreach ($userNames as $userProfile) {
                        $userName = $userProfile['uname']; // Access the 'uname' column
                        echo '<tr>';
                        echo '<td><input class="chkbx" type="checkbox" id="' . $userName . '" name="checkbox1"></td>'; // Checkbox column
                        echo '<td>' . $userName . '</td>'; // Username column
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

    <!-- Suspend User Confirmation Page (Hidden for now)-->
    <div class="popup-msg">
        <div class="confirm-suspend mt-5">
            <h1>User Profile Suspended</h1>
            <!-- logic to get data reflected here for suspended user types-->
            <p><b>User 'John' is suspended</b></p>
            <div class="popup-btn mt-5">
                <a href="#" class="button" id="undo-suspend" type="undoSuspend">Undo</button>
                <a href="userProfile.html" class="button">Confirm</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });

    function showSuspendConfirmation() {
        var confirmationPage = document.querySelector('.popup-msg');
        confirmationPage.style.display = 'block';
        confirmationPage.scrollIntoView();
    }

    document.addEventListener('DOMContentLoaded', function () {
        var selectAll = document.getElementById('select-all-users');
        selectAll.addEventListener('change', function (e) {
            var allCheckboxes = document.querySelectorAll('.chkbx');
            allCheckboxes.forEach(function (checkbox) {
                checkbox.checked = e.target.checked;
            });
        });
    });
</script>

</body>
</html>
