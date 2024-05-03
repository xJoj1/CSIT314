<?php
include("suspendAcccontroller.php");
include("config.php");
$suspendController = new SuspendAccController($conn);
$suspendedUsers = $suspendController->getSuspendedUsers();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['unsuspendUser'])) {
        $userId = $_POST['userId']; // Assuming you have a hidden input field for user ID in your form
        $result = $suspendController->unsuspendUser($userId);
        if ($result) {
            // Reload the page to reflect changes
            header("Location: suspendedAcc.php");
            exit();
        } else {
            // Handle unsuspend failure
            echo "Failed to unsuspend user.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Suspended User's List</title>
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
      <a class="navbar-brand" href="dashboard.html">Real Estate</a>
      
      <!-- Links -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="dashboard.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="userAccounts.php">User Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">User Profiles</a>
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
            <a class="dropdown-item" href="logout.html">Logout</a> <!-- Link to logout.html -->
          </div>
        </li>
      </ul>
    </nav>

    <!-- Suspend List -->
    <div class="container mt-5">

        <h1><b>Suspended User Accounts</b></h1>
        <!-- Main Body (List) -->
        <div class="suspend-container">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="selectAll">
            <!-- Need backend to do up a function to check all other checkboxes-->
            <input class="checkbox" type="checkbox" id="select-all-users" name="select-all-users">
            <p><b>Select All Users</b></p>
            <button id="unsuspendUser" name="unsuspendUser" type="submit">Unsuspend User</button>
        </div>
        <div class="suspendList">
            <?php foreach ($suspendedUsers as $user) { ?>
                <div class="checkbox">
                    <input class="chkbx" type="checkbox" id="<?php echo $user['uname']; ?>" name="selectedUsers[]" value="<?php echo $user['uname']; ?>">
                    <input type="hidden" name="userId" value="<?php echo $user['uname']; ?>">
                    <p><?php echo $user['uname']; ?></p>
                </div>
            <?php } ?>
        </div>
</form>

        </div><br>
        
        <!-- Back Button -->
        <a id="back" href="userAccounts.php" class="btn btn-secondary" role="button">Back</a>
        </div>
    </div>

    <script>
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