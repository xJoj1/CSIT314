<?php
//这一块我还不知道怎么链接服务器
//I don't know how to manipulate entity in this php


require_once '../app_config.php';
session_start();


?>




<?php
$pageTitle = "Admin Dashboard";
include APP_ROOT."/boundary/header.php";
?>
<!-- Navigation Bar (Logged In) -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="adminDashboardBoundary.php">Real Estate</a>

  <!-- Links -->
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="adminDashboardBoundary.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="userAccountsBoundary.php">User Accounts</a>
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

<div class="container mt-5">
    <h1>Admin Dashboard</h1>
    <p>Welcome to your dashboard. Manage your tasks efficiently and effectively.</p>
</div>

<?php
include APP_ROOT."/boundary/footer.php";
?>
