<?php
function displayNavBar($activeMenu = '') {
    echo '<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="adminDashboardBoundary.php">Real Estate</a>

        <!-- Links -->
        <ul class="navbar-nav mr-auto">';

    // Home link
    echo '<li class="nav-item">
            <a class="nav-link" href="adminDashboardBoundary.php">Home</a>
          </li>';

    if ($activeMenu == 'userAccounts') {
        // User Accounts dropdown with expansion
        echo '<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userAccMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    User Accounts
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
                    <a class="dropdown-item" href="suspendedAccBoundary.php">Suspended Users</a>
                </div>
              </li>';
    } else {
        // User Accounts as a simple link
        echo '<li class="nav-item">
                <a class="nav-link" href="userAccountsBoundary.php">User Accounts</a>
              </li>';
    }

    // User Profiles link
    echo '<li class="nav-item">
            <a class="nav-link" href="viewUserProfileListUI.php">User Profiles</a>
          </li>';

    echo '</ul>';

    // Right-aligned dropdown for admin options
    echo '<ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Welcome Admin
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
         </ul>
    </nav>';
}

?>