<?php
require_once '../../Controller/SysAdmin/viewProfileListController.php'; // Adjust the path as needed

$controller = new viewProfileListController();
$profiles = $controller->getAllProfiles();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View User Profiles</title>
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
                <a class="nav-link dropdown-toggle" href="#" id="userAccMenu" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">User Accounts</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
                    <a class="dropdown-item" href="userAccounts.php">All Users</a>
                    <a class="dropdown-item" href="suspendedAcc.php">Suspended Users</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userAccMenu" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">User Profiles</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
                    <a class="dropdown-item" href="viewProfileListUI.php">All Profiles</a>
                    <a class="dropdown-item" href="suspendedProfile.php">Suspended Profiles</a>
                </div>
            </li>
        </ul>
        <!-- Right-aligned dropdown for admin options -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
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
            Profile suspended successfully
        </div>

        <!-- Search Bar -->
        <div class="search-container">
            <div class="searchbox">
                <p><b>Search User Profile</b></p>
                <input type="text" id="searchBox" name="searchBox" placeholder="Search.." size="40">
            </div>
            <div class="user-buttons">
                <a href="createUserProfileUI.php" class="button">Create Profile</a>
                <button onclick="editSelectedProfile()" class="button">Edit Profile</button>
                <a href="#" class="button" onclick="viewSelectedProfile()">View Profile</a>
                <a onclick="showSuspendConfirmation()" class="button">Suspend Profile</a>
            </div>
        </div>

        <!-- Main Body (List) -->
        <div class="suspend-container">
            <div class="selectAll">
                <input class="checkbox" type="checkbox" id="select-all-users" name="select-all-users">
                <p><b>Select All Users</b></p>
            </div>
            <div class="suspendList">
                <form id="profileSelectionForm">
                    <?php foreach ($profiles as $profile): ?>
                        <div class="checkbox">
                            <input class="chkbx" type="checkbox" name="profile_id[]"
                                id="profile<?php echo $profile['profile_id']; ?>"
                                value="<?php echo $profile['profile_id']; ?>">
                            <label
                                for="profile<?php echo $profile['profile_id']; ?>"><?php echo htmlspecialchars($profile['profile_type']); ?></label>
                        </div>
                    <?php endforeach; ?>
                </form>
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

            var selectAllCheckbox = document.getElementById('select-all-users');
            var profileCheckboxes = document.querySelectorAll('.chkbx');

            selectAllCheckbox.addEventListener('change', function () {

                profileCheckboxes.forEach(checkbox => checkbox.checked = this.checked);

            });

            profileCheckboxes.forEach(function (checkbox) {

                checkbox.addEventListener('change', function () {

                    if (!this.checked) {

                        selectAllCheckbox.checked = false;

                    } else {

                        const allChecked = Array.from(profileCheckboxes).every(chk => chk.checked);
                        selectAllCheckbox.checked = allChecked;

                    }

                });

            });

        });

        function editSelectedProfile() {
            const selectedProfile = document.querySelector('input[name="profile_id"]:checked');
            if (selectedProfile) {
                window.location.href = 'editUserProfileUI.php?profile_id=' + selectedProfile.value;
            } else {
                alert('Please select a profile to edit.');
            }
        }

        function viewSelectedProfile() {

            const selectedProfiles = document.querySelectorAll('input[name="profile_id[]"]:checked');

            if (selectedProfiles.length > 0) {

                let profileIds = [];
                selectedProfiles.forEach(profile => profileIds.push(profile.value));
                window.location.href = 'viewUserProfile.php?profile_ids=' + profileIds.join(',');

            } else {

                alert('Please select at least one profile to view.');

            }

        }

    </script>

</body>

</html>