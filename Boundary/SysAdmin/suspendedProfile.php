<?php
 require_once '../../Controller/SysAdmin/suspendedProfileController.php';
 $controller = new suspendedProfileController();
 $suspendedProfiles = $controller->getAllInActiveProfiles();

 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['profile_id'])) {
     $profileIds = $_POST['profile_id'];
     foreach ($profileIds as $profileId) {
      $result =  $controller->unsuspendUserProfile($profileId);
     }
     header("Location: suspendedProfile.php?message=" . urlencode("Selected profiles have been unsuspended successfully."));
     $message = $result ? "Profile suspended successfully." : "Failed to suspend profile.";
     echo "<div class='alert alert-success'>$safeMessage</div>";
     echo "<script>setTimeout(function() { window.location.href = 'suspendedProfile.php'; }, 3000);</script>";

     exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Suspended User's Profile List</title>
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
          <li class="nav-item">
            <a class="nav-link" href="viewUserAccountListUI.php">User Account</a>
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

    <div class="container mt-5">
    <h1><b>Suspended User Profiles</b></h1>
    <form id="profileSelectionForm" method="POST">
    <div class="suspend-container">
        <div class="selectAll">
            <input class="checkbox" type="checkbox" id="select-all-users" onclick="selectAll(this)">
            <p><b>Select All Users</b></p>
            <button id="unsuspendUser" type="submit" class="button">Unsuspend Selected Profiles</button>
        </div>
        <div class="suspendList">
            <?php foreach ($suspendedProfiles as $profile): ?>
                <div class="checkbox profile-entry">
                    <input class="chkbx" type="checkbox" name="profile_id[]" value="<?= $profile['profile_id'] ?>">
                    <label for="profile<?= $profile['profile_id'] ?>"><?= htmlspecialchars($profile['profile_type']) ?></label>
                </div>
            <?php endforeach; ?>
        </div>
    </form>
    </div><br>
    <a id="back" href="userProfile.php" class="btn btn-secondary" role="button">Back</a>
</div>

    <script>
        function selectAll(source) {
            checkboxes = document.querySelectorAll('.chkbx');
            for(var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
            }
        }
    </script>

  </body>
</html>