<?php
require_once '../app_config.php';
require_once APP_ROOT . '/Controller/SysAdmin/suspendedAccController.php';
require_once 'navbar.php';
session_start();

function displaySusUserList(){
    $suspendedAcc = new suspendedAccController();
    return $suspendedAcc->displaySusUserList();
}

?>


<?php
$pageTitle = "Admin Edit/Modify";
include APP_ROOT . "/Boundary/header.php";
?>

<!--start of nav bar-->
<?php
displayNavBar();
?>

    <!-- Suspend List -->
    <div class="container mt-5">

        <h1><b>Suspended User Accounts</b></h1>

        <!-- Main Body (List) -->
        <div class="suspend-container">
            <div class="selectAll">
                <!-- Need backend to do up a function to check all other checkboxes-->
                <input class="checkbox" type="checkbox" id="select-all-users" name="select-all-users">
                <p><b>Select All Users</b></p>
                <button id="unsuspendUser" type="unSuspendUser">Unsuspend User</button>

            </div>
            <div class="suspendList">
                <?php
                echo displaySusUserList();
                ?>

            </div>
        </div><br>
        <!-- Back Button -->
        <a id="back" href="userAccountsBoundary.php" class="btn btn-secondary" role="button">Back</a>
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