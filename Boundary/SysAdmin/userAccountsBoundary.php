<?php
require_once '../app_config.php';
require_once 'navbar.php';
require_once APP_ROOT . '/Controller/SysAdmin/userAccountsController.php';
session_start();


function displayUserList(){
    $user = new userAccountsController();
    return $user->displayUserAccounts();
}


if (isset($_GET['ids'])) {
    $ids = $_GET['ids'];  // 这将是一个数组，包含所有选中的复选框的值
    $userAcc = new userAccountsController();
    $userAcc->suspendUsers($ids);

}


?>

<?php
$pageTitle = "Suspend Users";
include APP_ROOT . "/Boundary/header.php";
?>

<?php
displayNavBar('userAccounts');
?>

<!-- Account List -->
<div class="container AccContain  mt-5">
    <!-- Alert bar -->
    <div class="suspendalert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        User suspended successfully
    </div>

    <!-- Search Bar -->
    <div class="search-container">
        <div class="searchbox">
            <p><b>Search User Account</b></p>
            <input type="text" id="searchBox" name="searchBox" placeholder="Search.." size="40">
        </div>
        <div class="user-buttons">
            <a href="createUserAccBoundary.php" id="createButton" class="button">Create User</a>
            <a href="javascript:void(0)" class="button" onclick="jumpEditUser()">Edit User</a>
            <a href="javascript:void(0)" class="button" onclick="jumpViewUser()">View User</a>
            <a onclick="showSuspendConfirmation()" class="button">Suspend User</a>
        </div>
    </div>

    <!-- Main Body (List) -->
    <form id="userForm" method="post">
        <div class="suspend-container">
            <div class="selectAll">
                <!-- Need backend to do up a function to check all other checkboxes-->
                <input class="checkbox" type="checkbox" id="select-all-users" name="select-all-users">
                <p><b>Select All Users</b></p>
            </div>
            <div class="suspendList">
                <?php echo displayUserList();?>
            </div>
        </div>
    </form>


    <!-- Suspend User Confirmation Page (Hidden for now)-->
    <div class="popup-msg">
        <div class="confirm-suspend mt-5">
            <h1>User Account Suspended</h1>
            <!-- logic to get data reflected here for suspended user types-->
            <p><b>User 'Test user 1', 'Test user 3' is suspended</b></p>
            <div class="popup-btn mt-5">
                <a href="userAccountsBoundary.php" class="button" id="undo-suspend" type="undoSuspend">Undo</a>
                <a  class="button" onclick="suspendUser()">Confirm</a>
            </div>
        </div>
    </div>
</div>

<script>
    var checkedValues = [];

    function suspendUser() {
        var checkedValues = []; // 假设这里是您收集的选中复选框的值

        // 收集复选框的值
        document.querySelectorAll('.chkbx:checked').forEach(function(checkbox) {
            checkedValues.push(checkbox.value);
        });

        // 创建查询字符串
        var queryString = checkedValues.map(function(id) {
            return 'ids[]=' + encodeURIComponent(id);
        }).join('&');

        // 构建完整的URL并重定向
        window.location.href = 'userAccountsBoundary.php?' + queryString;
    }


    function showSuspendConfirmation() {
        // Get the confirmation page element
        var confirmationPage = document.querySelector('.popup-msg');
    
        // Set the display property to 'block' to show it
        confirmationPage.style.display = 'block';
    
        // Optionally, scroll to the confirmation page
        confirmationPage.scrollIntoView();
    }

    // Checking of all checkbox
    function showSuspendConfirmation() {
        // 获取所有带有 'chkbx' 类的被选中的复选框元素
        var checkboxes = document.querySelectorAll('.chkbx:checked');
        var suspendedUsers = [];


        // 遍历所有被选中的复选框，收集用户信息
        checkboxes.forEach(function(checkbox) {
            suspendedUsers.push(checkbox.parentElement.textContent.trim());
            // 如果复选框被选中
            if (checkbox.checked) {
                // 将复选框的值添加到数组中
                checkedValues.push(checkbox.value);
            }
        });

        console.log(checkedValues);


        // 创建用户被暂停的消息
        var message = "User '" + suspendedUsers.join("', '") + "' is suspended";

        // 更新弹出窗口的内容
        var popupMessage = document.querySelector('.popup-msg p');
        popupMessage.innerHTML = "<b>" + message + "</b>";

        // 显示弹出窗口
        var confirmationPage = document.querySelector('.popup-msg');
        confirmationPage.style.display = 'block';
        confirmationPage.scrollIntoView();
    }

    // 可能还需要一个函数来处理页面加载时全选复选框的逻辑
    document.addEventListener('DOMContentLoaded', function () {
        var selectAllCheckbox = document.getElementById('select-all-users');
        selectAllCheckbox.addEventListener('change', function (e) {
            var allCheckboxes = document.querySelectorAll('.chkbx');
            allCheckboxes.forEach(function (checkbox) {
                checkbox.checked = e.target.checked;
            });
        });
    });



    //user create button to pass checkbox value
    document.getElementById('createButton').addEventListener('click', function() {
        document.getElementById('userForm').submit(); // 触发表单提交
    });

    // 函数：识别并记录被选中的复选框的ID
    function jumpViewUser() {
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

        // 在控制台打印所有被选中的复选框的ID
        // console.log('Checked checkbox IDs:', checkedIds);

        if (checkedIds.length !== 1) {
            alert('Please Select one user to view')
            return false
        }

        let uid = checkedIds[0]

        window.location.href = 'viewUserBoundary.php?uid=' + uid;
        // window.location.href = '../loginBoundary.php';
    }

    function jumpEditUser(){
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


        if (checkedIds.length !== 1) {
            alert('Please Select one user to edit')
            return false
        }

        let uid = checkedIds[0]

        window.location.href = 'editUserAccBoundary.php?uid=' + uid;

    }



</script>

<?php
include APP_ROOT . "/Boundary/footer.php";
?>
