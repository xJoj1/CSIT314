<?php
include("userAccountscontroller.php");
include("config.php");
$controller = new UserController($conn);
// Initialize $userList variable
$userList = [];

// Check if search query is provided
if(isset($_GET['searchBox'])) {
    $searchQuery = $_GET['searchBox'];
    $userList = $controller->searchUsers($searchQuery);
} else {
    $userList = $controller->getUserList();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suspend Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> 
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
          <a class="dropdown-item" href="logout.php">Logout</a> <!-- Link to logout.html -->
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
            <button id="searchButton" onclick="searchUsers()"  >Search</button>
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
        <div id="userList"></div>
        <?php
                // Display user names received from the controller
                foreach ($userList as $userProfile) {
                    $userName = $userProfile['uname']; // Access the 'uname' column
                    echo '<div class="checkbox">';
                    echo '<input class="chkbx" type="checkbox" id="' . $userName . '" name="checkbox1">';
                    echo '<p>' . $userName . '</p>';
                    echo '</div>';
                }
                
            ?>
            
        </div>
    </div>

    <!-- Suspend User Confirmation Page (Hidden for now)-->
   
    <div class="popup-msg">
        <div class="confirm-suspend mt-5">
            <h1>User Account Suspended</h1>
            <!-- logic to get data reflected here for suspended user types-->
            <p><b>User is suspended</b></p>
            <div class="popup-btn mt-5">
                <a href="#" class="button" id="undo-suspend" type="undoSuspend">Undo</a>
                <a href="userAccounts.php" class="button" id="confirm-suspend">Confirm</a> <!-- Add id for the button -->
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
    document.addEventListener('DOMContentLoaded', function() {
    // Logging button click event
    document.getElementById('searchButton').addEventListener('click', function() {
        console.log('Search button clicked');
    });
    });



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
    document.addEventListener('DOMContentLoaded', function() {
    // Logging button click event
    document.getElementById('searchButton').addEventListener('click', function() {
        console.log('Search button clicked');
    });

    // Add event listener for suspend button click
    document.getElementById('confirm-suspend').addEventListener('click', function() {
        var checkedUserNames = [];
        var checkboxes = document.querySelectorAll('.chkbx:checked');
        
        checkboxes.forEach(function(checkbox) {
            checkedUserNames.push(checkbox.id);
        });

        if (checkedUserNames.length > 0) {
            // Send an AJAX request to suspend users
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'userAccountscontroller.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle response from server
                    var response = xhr.responseText;
                    if (response === 'success') {
                        // Show suspend confirmation message
                        showSuspendConfirmation();
                    } else {
                        // Handle error
                        console.log('Failed to suspend user.');
                    }
                }
            };
            xhr.send('action=suspend&usernames=' + JSON.stringify(checkedUserNames));
        } else {
            console.log('No user selected to suspend.');
        }
    });
});

</script>

</body>
</html>
