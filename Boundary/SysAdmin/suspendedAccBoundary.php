<?php
require_once '../app_config.php';
require_once APP_ROOT . '/Controller/SysAdmin/suspendedAccController.php';
require_once 'navbar.php';
session_start();

function displaySusUserList(){
    $suspendedAcc = new suspendedAccController();
    return $suspendedAcc->displaySusUserList();
}


if (isset($_GET['suSids'])) {
    $ids = $_GET['suSids'];  // 这将是一个数组，包含所有传递的ID

//    dump($ids);


    $suspendedAcc = new suspendedAccController();
    $suspendedAcc->unSuspendUser($ids);
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
                <button id="unsuspendUser" type="unSuspendUser" onclick="suspendUser()">Unsuspend User</button>

            </div>
            <div class="suspendList">
                <?php
                echo displaySusUserList();
                ?>

            </div>
        </div><br>
        <!-- Back Button -->
        <a id="back" href="userAccountsBoundary.php" class="btn btn-secondary" role="button" >Back</a>
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



    function suspendUser() {
        // 获取所有带有 'chkbx' 类的复选框元素
        var checkboxes = document.querySelectorAll('.chkbx');
        // 用来保存被选中的复选框的ID的数组
        var checkedIds = [];
        // 遍历所有复选框
        checkboxes.forEach(function(checkbox) {
            // 如果复选框被选中
            if (checkbox.checked) {
                // 将复选框的ID添加到数组中
                checkedIds.push(checkbox.value);
            }
        });


        if (checkedIds.length === 0) {
            alert('Please Select one user to edit')
            return false
        }

        console.log(checkedIds);


        var checkedValues = Array.from(checkboxes).map(checkbox => checkbox.value);

        // 创建查询字符串
        var queryString = checkedValues.map(value => `suSids[]=${encodeURIComponent(value)}`).join('&');

        window.location.href = 'suspendedAccBoundary.php?' + queryString;

    }



    </script>

  </body>
</html>