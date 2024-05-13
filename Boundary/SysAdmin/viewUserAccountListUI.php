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
    <?php
        require '../../Controller/SysAdmin/viewAccountListController.php';
        $controller = new viewAccountListController();
        $users = $controller->getAllAccounts();  // Fetch all user accounts
    ?>

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
            <a class="dropdown-item" href="suspendedAccount.php">Suspended Users</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="viewUserProfileListUI.php">User Profiles</a>
      </li>
    </ul>
    <!-- Right-aligned dropdown for admin options -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Welcome Admin
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
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
    <div class="search-container2">
        <div class="user-buttons2">
            <a href="searchUserAccountUI.php" class="button">Search User</a>
            <a href="createUserAccountUI.php" class="button">Create User</a>
            <button onclick="editSelectedUser()" class="button">Edit User</button>
            <a href="#" onclick="viewSelectedUser()" class="button" >View User</a>
            <a href="#" onclick="suspendSelectedAccounts()" class="button suspend" id="suspendButton" onclick="suspendSelectedUsers()" disabled>Suspend User</a>
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
            <form id="userSelectionForm">
                <?php if (empty($users)): ?>
                    <p>No user accounts found.</p>
                <?php else: ?>
                    <?php foreach ($users as $user): ?>  <!-- Loop through each user -->
                        <?php if ($user['status'] == 'active'): ?>
                            <div class="checkbox user-entry"
                            data-user-type ="<?php echo htmlspecialchars($user['username']); ?>" >
                                <input class="chkbx" type="checkbox" name="user_id[]"
                                    id="user<?php echo $user['user_id']; ?>"
                                    value="<?php echo $user['user_id']; ?>">
                                <label for="user<?php echo $user['user_id']; ?>">
                                    <?php echo htmlspecialchars($user['username']); ?>
                                </label>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var selectAllCheckbox = document.getElementById('select-all-users');
        var accountCheckboxes = document.querySelectorAll('.chkbx');

        selectAllCheckbox.addEventListener('change', function () {
            accountCheckboxes.forEach(checkbox => checkbox.checked = this.checked);
        });

        accountCheckboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                if (!this.checked) {
                    selectAllCheckbox.checked = false;
                } else {
                    const allChecked = Array.from(accountCheckboxes).every(chk => chk.checked);
                    selectAllCheckbox.checked = allChecked;
                }
            });
        });
    });

    // Edit, View, and Suspend functions
    function editSelectedUser() {
        const selectedUser = document.querySelector('input[name="user_id[]"]:checked');
        if (selectedUser) {
            window.location.href = 'editUserAccountUI.php?user_id=' + selectedUser.value;
        } else {
            alert('Please select a user to edit.');
        }
    }

    function viewSelectedUser() {
        const selectedUsers = document.querySelectorAll('input[name="user_id[]"]:checked');
        if (selectedUsers.length > 0) {
            let userIds = [];
            selectedUsers.forEach(user => {
                userIds.push(user.value);
            });
            window.location.href = 'viewUserAccountDetailUI.php?user_ids=' + userIds.join(',');
        } else {
            alert('Please select at least one user to view.');
        }
    }

    function suspendSelectedAccounts() {
        let selectedAccounts = [];
        // Collect all checked checkboxes from the user account list
        document.querySelectorAll('input[name="user_id[]"]:checked').forEach(function(checkbox) {
            let userId = checkbox.value;
            // Properly retrieve the 'data-user-type' attribute
            let userName = checkbox.closest('.user-entry').getAttribute('data-user-type');
            selectedAccounts.push({
                userId: userId,
                userName: userName
            });
        });

        // //multi
        let p = JSON.stringify(selectedAccounts);
        p = encodeURIComponent(p)
        window.location.href = "suspendUserAccountUI.php?data=" + p;
    }
</script>

</body>
</html>
