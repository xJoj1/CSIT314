<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../styles.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
        require_once '../../Controller/SysAdmin/searchUserAccountController.php';
        $controller = new searchUserAccountController();
        $accounts = $controller->getUserByName();
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
    <div class="search-container">
        <div class="searchbox">
            <p><b>Search User Account</b></p>
            <input type="text" id="searchBox" name="searchBox" placeholder="Search.." onkeyup="filterAccounts()" size="40">
        </div>
        <div class="user-buttons">
            <a href="createUserAccountUI.php" class="button">Create User</a>
            <button onclick="editSelectedUser()" class="button">Edit User</button>
            <a href="#" onclick="viewSelectedUser()" class="button">View User</a>
            <a href="#" onclick="suspendSelectedAccounts()" class="button suspend">Suspend User</a>
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
            <form id="accountSelectionForm">
                <?php if (empty($accounts)): ?>
                    <p>No user accounts found.</p>
                <?php else: ?>
                    <?php foreach ($accounts as $account): ?>
                        <?php if ($account['status'] == 'active'): ?>
                            <div class="checkbox account-entry"
                                 data-user-name="<?php echo htmlspecialchars($account['username']); ?>">
                                <input class="chkbx" type="checkbox" name="user_id[]"
                                       id="account<?php echo $account['user_id']; ?>"
                                       value="<?php echo $account['user_id']; ?>">
                                <label for="account<?php echo $account['user_id']; ?>">
                                    <?php echo htmlspecialchars($account['username']); ?>
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


    function editSelectedUser() {
        const selectedUser = document.querySelector('input[name="user_id[]"]:checked');  
        if (selectedUser) {
            window.location.href = 'editUserAccountUI.php?user_id=' + selectedUser.value;  
        } else {
            alert('Please select an account to edit.');
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

    function filterAccounts() {
        var input = document.getElementById('searchBox');
        var filter = input.value.toUpperCase();
        var accounts = document.querySelectorAll('.account-entry');
        var accountContainer = document.getElementById('accountSelectionForm');
        var found = false;

        if (filter === '') {

            accountContainer.innerHTML =
                `<?php if (empty($accounts)): ?>
                            <p>No user profiles found.</p>
            <?php else: ?>
                <?php foreach ($accounts as $account): ?>
                    <?php if ($account['status'] == 'active'): ?>
                                <div class="checkbox profile-entry" data-profile-type="
                                <?php echo htmlspecialchars($account['username']); ?>">
                                <input class="chkbx" type="checkbox" name="user_id[]"
                                id="account<?php echo $account['user_id']; ?>"
                                value="<?php echo $account['user_id']; ?>">
                                <label for="account<?php echo $account['user_id']; ?>">
                                <?php echo htmlspecialchars($account['username']); ?>
                                </label>
                                </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>`;

            return;

        }

        accounts.forEach(account => {
            var txtValue = account.getAttribute('data-user-name').toUpperCase();
            if (txtValue.indexOf(filter) > -1) {
                account.style.display = "";
                found = true;
            } else {
                account.style.display = "none";
            }
        });

        if (!found) {
            accountContainer.innerHTML = '<p>No user accounts found.</p>';
        }
    }




    function suspendSelectedAccounts() {
        const selectedUser = document.querySelector('input[name="user_id[]"]:checked');  
        if(selectedUser){

            let selectedAccounts = [];
        // Collect all checked checkboxes from the user account list
        document.querySelectorAll('input[name="user_id[]"]:checked').forEach(function(checkbox) {
            let userId = checkbox.value;
            // Properly retrieve the 'data-user-name' attribute
            let userName = checkbox.closest('.account-entry').getAttribute('data-user-name');
            selectedAccounts.push({
                userId: userId,
                userName: userName
            });
        });
        }else{
            alert('Please select an account to suspend.');
        }
       

        // //multi
        let p = JSON.stringify(selectedAccounts);
        p = encodeURIComponent(p)
        window.location.href = "suspendUserAccountUI.php?data=" + p;
    }
</script>

</body>
</html>
