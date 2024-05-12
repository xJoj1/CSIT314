<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../styles.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <?php
    require_once '../../Controller/SysAdmin/viewUserAccountDetailController.php';
    $controller = new viewUserAccountDetailController();
    $users = $controller->getUsers();
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
            <a class="dropdown-item" href="suspendedAcc.php">Suspended Users</a>
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

<!-- Container for View User Account -->
<div class="container mt-5">
  <div class="view-container"> 
    <a href="viewUserAccountListUI.php" class="back-arrow">‹ Back to List</a>
    <h2 class="text-center mb-4">View User Account</h2>
    <?php if (!empty($users)): ?>
      <?php foreach ($users as $user): ?>
        <table class="user-table mt-5"> 
          <!-- Table content -->
          <tr>
              <th>Name:</th>
              <td><?= htmlspecialchars($user['username']) ?></td>
          </tr>
          <tr>
              <th>User ID:</th>
              <td><?= htmlspecialchars($user['user_id']) ?></td>
          </tr>
          <tr>
              <th>Birthdate:</th>
              <td><?= htmlspecialchars($user['birthdate']) ?></td>
          </tr>
          <tr>
              <th>Address:</th>
              <td><?= htmlspecialchars($user['address']) ?></td>
          </tr>
          <tr>
              <th>Contact:</th>
              <td><?= htmlspecialchars($user['contact']) ?></td>
          </tr>
          <tr>
              <th>Status:</th>
              <td><?= htmlspecialchars($user['status']) ?></td>
          </tr>
        </table>
      <?php endforeach; ?>
    <?php else: ?>
      <p>No user accounts found.</p>
    <?php endif; ?>
  </div>
</div>
</body>
</html>