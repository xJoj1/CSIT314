<?php
require_once '../app_config.php';
require_once 'navbar.php';
require_once APP_ROOT . '/Controller/SysAdmin/viewUserController.php';
session_start();

$userID = isset($_GET['uid']) ? $_GET['uid'] : 0;

function displayUserInfo($userID){
    $viewUserController = new viewUserController();
    return $viewUserController->displayUserInfo($userID);
}

?>

<?php
$pageTitle = "View Users";
include APP_ROOT . "/Boundary/header.php";
?>

<!-- Navigation Bar (Logged In) -->
<?php
displayNavBar('userAccounts');
?>

<!-- Container for View User Account -->
<div class="container mt-5">
  <div class="view-container"> 
    <a href="userAccountsBoundary.php" class="back-arrow">‹</a>
    <h2 class="text-center mb-4">View User Account</h2>
    <table class="user-table mt-5"> 
      <!-- Table content -->
        <?php
        echo displayUserInfo($userID);
        ?>
        </table>
    </div>
</div>
</body>
</html>

<!-- hi -->