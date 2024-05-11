<?php
require_once '../../Controller/SysAdmin/SuspendUserProfileController.php';

$controller = new SuspendUserProfileController();
$message = '';
$profileFound = false;

// Handling POST request to suspend the profile
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm'])) {
    $profileId = $_POST['profileId']; // Hidden field to keep profile ID on POST
    $result = $controller->suspendUserProfile($profileId);
    $message = $result ? "Profile suspended successfully." : "Failed to suspend profile.";
    header("Location: viewUserProfileListUI.php?message=" . urlencode($message));
    exit();
}

// Get profile details for confirmation
if (isset($_GET['profileName'], $_GET['profileId'])) {
    $profileName = htmlspecialchars($_GET['profileName']);
    $profileId = htmlspecialchars($_GET['profileId']);
    $profile = $controller->getProfileById($profileId); // Fetch profile data
    $profileFound = !empty($profile);
}
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
        <a class="nav-link" href="viewUserAccountListUI.php">User Accounts</a>
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
          <a class="dropdown-item" href="../../logout.php">Logout</a> <!-- Link to logout.php -->
        </div>
      </li>
    </ul>
</nav>

<!-- Account List -->
<div class="container AccContain mt-5">
    <div class="suspend-profile">
        <div class="confirm-suspend mt-5">
            <h1>Suspend User Profile</h1>
            <?php if ($profileFound): ?>
                <p><b>Are you sure you want to suspend the profile: <?= $profileName ?>?</b></p>
                <form method="POST">
                    <input type="hidden" name="profileId" value="<?= $profileId ?>">
                    <button type="submit" name="confirm" class="btn btn-danger" style="text-align: center;">Confirm</button>
                </form>
            <?php else: ?>
                <div class="alert alert-warning">Profile not found.</div>
            <?php endif; ?>
            <div class="popup-btn mt-5">
                <a href="viewUserProfileListUI.php" class="button">Undo</a>
            </div>
        </div>
    </div>
</div>