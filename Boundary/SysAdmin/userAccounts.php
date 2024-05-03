<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suspend Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../styles.css"> 
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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="userAccMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            User Accounts
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
            <a class="dropdown-item" href="suspendedAcc.php">Suspended Users</a>
        </div>
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
          <a class="dropdown-item" href="../../logout.php">Logout</a> <!-- Link to logout.php -->
        </div>
      </li>
    </ul>
</nav>

<!-- Account List -->
<div class="container AccContain  mt-5">
    <!-- Alert bar -->
    <div class="suspendalert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        User suspended successfully
    </div>

    <!-- Search Bar -->
    <div class="search-container">
        <div class="searchbox">
            <p><b>Search User Account</b></p>
            <input type="text" id="searchBox" name="searchBox" placeholder="Search.." size="40">
        </div>
        <div class="user-buttons">
            <a href="createUserAcc.php" class="button">Create User</a>
            <a href="editUserAcc.php" class="button">Edit User</a>
            <a href="viewUser.php" class="button">View User</a>
            <a onclick="showSuspendConfirmation()" class="button">Suspend User</a>
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
            <div class="checkbox">
                <input class="chkbx" type="checkbox" id="tuser1" name="checkbox1">
                <p>Test User 1</p>
            </div>
            <div class="checkbox">
                <input class="chkbx" type="checkbox" id="tuser2" name="checkbox1">
                <p>Test User 2</p>
            </div>
            <div class="checkbox">
                <input class="chkbx" type="checkbox" id="tuser3" name="checkbox1">
                <p>Test User 3</p>
            </div>
            <div class="checkbox">
                <input class="chkbx" type="checkbox" id="tuser4" name="checkbox1">
                <p>Test User 4</p>
            </div>
            <div class="checkbox">
                <input class="chkbx" type="checkbox" id="tuser5" name="checkbox1">
                <p>Test User 5</p>
            </div>
            <div class="checkbox">
                <input class="chkbx" type="checkbox" id="tuser6" name="checkbox1">
                <p>Test User 6</p>
            </div>
        </div>
    </div>

    <!-- Suspend User Confirmation Page (Hidden for now)-->
    <div class="popup-msg">
        <div class="confirm-suspend mt-5">
            <h1>User Account Suspended</h1>
            <!-- logic to get data reflected here for suspended user types-->
            <p><b>User 'Test user 1', 'Test user 3' is suspended</b></p>
            <div class="popup-btn mt-5">
                <a href="#" class="button" id="undo-suspend" type="undoSuspend">Undo</button>
                <a href="userAccounts.php" class="button">Confirm</a>
            </div>
        </div>
    </div>
</div>

<script>
    function showSuspendConfirmation() {
        // Get the confirmation page element
        var confirmationPage = document.querySelector('.popup-msg');
    
        // Set the display property to 'block' to show it
        confirmationPage.style.display = 'block';
    
        // Optionally, scroll to the confirmation page
        confirmationPage.scrollIntoView();
    }

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