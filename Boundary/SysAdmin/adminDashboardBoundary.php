<?php

require_once '../app_config.php';
require_once 'navbar.php';
session_start();


?>




<?php
$pageTitle = "Admin Dashboard";
include APP_ROOT . "/Boundary/header.php";
?>
<!-- Navigation Bar (Logged In) -->
<?php
displayNavBar();
?>

<div class="container mt-5">
    <h1>Admin Dashboard</h1>
    <p>Welcome to your dashboard. Manage your tasks efficiently and effectively.</p>
</div>

<?php
include APP_ROOT . "/Boundary/footer.php";
?>
