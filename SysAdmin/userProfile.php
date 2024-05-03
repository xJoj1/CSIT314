<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suspend Users</title>
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
      <li class="nav-item dropdown">
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
          <a class="dropdown-item" href="../logout.php">Logout</a> <!-- Link to logout.php -->
        </div>
      </li>
    </ul>
</nav>

<!-- Account List -->
<div class="container AccContain  mt-5">
    <!-- Alert bar -->
    <div class="suspendalert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Profile suspended successfully
    </div>

    <!-- Search Bar -->
    <div class="search-container">
        <div class="searchbox">
            <p><b>Search User Profile</b></p>
            <input type="text" id="searchBox" name="searchBox" placeholder="Search.." size="40">
        </div>
        <div class="user-buttons">
            <a href="createUserProfile.php" class="button">Create Profile</a>
            <a href="editUserProfile.php" class="button">Edit Profile</a>
            <a href="viewProfile.php" class="button">View Profile</a>
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
            <div class="checkbox">
                <input class="chkbx" type="checkbox" id="John" name="checkbox1">
                <p>John</p>
            </div>
            <div class="checkbox">
                <input class="chkbx" type="checkbox" id="Ignatius" name="checkbox1">
                <p>Ignatius</p>
            </div>
            <div class="checkbox">
                <input class="chkbx" type="checkbox" id="Penny" name="checkbox1">
                <p>Penny</p>
            </div>
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
                <a href="userProfile.php" class="button">Confirm</a>
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

    document.addEventListener('DOMContentLoaded', function () {
        // Select the 'Select All' checkbox
        var selectAll = document.getElementById('select-all-users');
        
        // Add a change event listener to the 'Select All' checkbox
        selectAll.addEventListener('change', function (e) {
        // Select all checkboxes with the 'chkbx' class
        var allCheckboxes = document.querySelectorAll('.chkbx');
        
        // Loop through all checkboxes and set their 'checked' property
        allCheckboxes.forEach(function (checkbox) {
            // Set the checked state to match the 'Select All' checked state
            checkbox.checked = e.target.checked;
        });
        });
    });
</script>

</body>
</html>
