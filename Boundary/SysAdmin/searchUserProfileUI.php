<?php

require_once '../../Controller/SysAdmin/searchUserProfileController.php';

$controller = new searchUserProfileController();
$profiles = $controller->searchUserProfile();

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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/popper.min.js"></script>
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
                <a class="nav-link" href="viewUserAccountListUI.php">User Accounts</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userAccMenu" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">User Profiles</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
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
                    <a class="dropdown-item" href="../../logout.php">Logout</a> <!-- Link to logout.php -->
                </div>
            </li>
        </ul>
    </nav>

    <?php
    require_once '../../Controller/SysAdmin/viewUserProfileListController.php'; // Adjust the path as needed
    $controller = new viewUserProfileListController();
    $profiles = $controller->getAllActiveProfiles();
    ?>

    <div class="container AccContain mt-5">
        <div class="search-container">
            <div class="searchbox">
                <p><b>Search User Profile</b></p>
                <input type="text" id="searchBox" placeholder="Search user profiles..." onkeyup="filterProfiles()"
                    size="40">
            </div>
            <div class="user-buttons">
                <a href="createUserProfileUI.php" class="button">Create Profile</a>
                <button onclick="editSelectedProfile()" class="button">Edit Profile</button>
                <a href="#" class="button" onclick="viewSelectedProfile()">View Profile</a>
                <a href="#" class="button suspend" id="suspendButton" onclick="suspendSelectedProfiles()" disabled>Suspend Profile</a>
            </div>
        </div>
        <div class="suspend-container">
            <div class="selectAll">
                <input class="checkbox" type="checkbox" id="select-all-users" name="select-all-users">
                <p><b>Select All Users</b></p>
            </div>
            <div class="suspendList">
                <form id="profileSelectionForm">
                    <?php if (empty($profiles)): ?>
                        <p>No user profiles found.</p>
                    <?php else: ?>
                        <?php foreach ($profiles as $profile): ?>
                            <div class="checkbox profile-entry"
                                data-profile-type="<?php echo htmlspecialchars($profile['profile_type']); ?>">
                                <input class="chkbx" type="checkbox" name="profile_id[]"
                                    id="profile<?php echo $profile['profile_id']; ?>"
                                    value="<?php echo $profile['profile_id']; ?>">
                                <label for="profile<?php echo $profile['profile_id']; ?>">
                                    <?php echo htmlspecialchars($profile['profile_type']); ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            var selectAllCheckbox = document.getElementById('.button.suspend');
            var profileCheckboxes = document.querySelectorAll('.chkbx');

            // Function to update the suspend button's disabled state
            function updateSuspendButtonState() {
                let anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
                suspendButton.disabled = !anyChecked; // Disable if none are checked
            }

            // Initial check to possibly disable on page load
            updateSuspendButtonState();

            // Attach change event to all checkboxes
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    updateSuspendButtonState();
                });
            });

            // Function for selecting all checkboxes
            document.getElementById('select-all-users').addEventListener('change', function () {
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
            updateSuspendButtonState(); // Update button state when all selections change
            });
        });

        function editSelectedProfile() {
            const selectedProfile = document.querySelector('input[name="profile_id[]"]:checked');
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
                window.location.href = 'viewUserProfileDetailUI.php?profile_ids=' + profileIds.join(',');
            } else {
                alert('Please select at least one profile to view.');
            }
        }

        function suspendProfile() {
            const selectedProfiles = document.querySelectorAll('input[name="profile_id[]"]:checked');
            if (selectedProfiles.length > 0) {
                let profileIds = [];
                selectedProfiles.forEach(profile => profileIds.push(profile.value));
                window.location.href = 'suspendUserProfileUI.php?profile_ids=' + profileIds.join(',');
            } else {
                alert('Please select at least one profile to suspend.');
            }
        }

        function updateSuspendButtonState() {
            let anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
            suspendButton.disabled = !anyChecked; // Disable if none are checked
        }

        function suspendSelectedProfiles() {
            let selectedProfiles = [];
            document.querySelectorAll('input[name="profile_id[]"]:checked').forEach(function(checkbox) {
                let profileId = checkbox.value;
                let profileType = checkbox.closest('.profile-entry').getAttribute('data-profile-type');
                selectedProfiles.push({
                    profileId: profileId,
                    profileType: profileType
                });
            });
            if (selectedProfiles.length > 0) {
                let profile = selectedProfiles[0]; // Taking the first selected profile for action
                suspendProfileWithName(profile.profileType, profile.profileId);
            } else {
                alert('Please select at least one profile to suspend.');
            }
        }

        function suspendProfileWithName(profileType, profileId) {
            window.location.href = "suspendUserProfileUI.php?profileName=" + encodeURIComponent(profileType) + "&profileId=" + encodeURIComponent(profileId);
        }

        function filterProfiles() {

            var input = document.getElementById('searchBox');
            var filter = input.value.toUpperCase();
            var profiles = document.querySelectorAll('.profile-entry');
            var profileContainer = document.getElementById('profileSelectionForm');
            var found = false;

            if (filter === '') {

                profileContainer.innerHTML =
                    `<?php if (empty($profiles)): ?>
                                <p>No user profiles found.</p>
                <?php else: ?>
                    <?php foreach ($profiles as $profile): ?>
                                    <div class="checkbox profile-entry" data-profile-type="
                                    <?php echo htmlspecialchars($profile['profile_type']); ?>">
                                    <input class="chkbx" type="checkbox" name="profile_id[]"
                                    id="profile<?php echo $profile['profile_id']; ?>"
                                    value="<?php echo $profile['profile_id']; ?>">
                                    <label for="profile<?php echo $profile['profile_id']; ?>">
                                    <?php echo htmlspecialchars($profile['profile_type']); ?>
                                    </label>
                                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>`;

                return;

            }

            profiles.forEach(profile => {

                var txtValue = profile.getAttribute('data-profile-type').toUpperCase();

                if (txtValue.indexOf(filter) > -1) {

                    profile.style.display = "";
                    found = true;

                } else {

                    profile.style.display = "none";

                }

            });

            if (!found) {

                profileContainer.innerHTML = '<p>No user profiles found.</p>';

            }

        }

    </script>

</body>

</html>