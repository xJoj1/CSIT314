<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Suspended User's List</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="../../styles.css"> 
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>

    <?php
      require_once '../../Controller/SysAdmin/suspendedAccountController.php';
      $controller = new suspendedAccountController();
      $SuspendUserList = $controller->getSuspendedUserAccount();

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          if (!empty($_POST['user_id'])) {
              $userIds = $_POST['user_id'];
              $result = $controller->unSuspendUserList($userIds);
              $message = $result ? "user(s) unsuspended successfully." : "Failed to unsuspend user(s).";
              header('location: suspendedAccount.php');

          } else {
              echo "No users selected";
          }
      }
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

    <!-- Suspend List -->
    <div class="container mt-5">

        <h1><b>Suspended User Accounts</b></h1>

        <!-- Main Body (List) -->
        <div class="suspend-container">
            <div class="selectAll">
                <!-- Need backend to do up a function to check all other checkboxes-->
                <input class="checkbox" type="checkbox" id="select-all-users" name="select-all-users">
                <p><b>Select All Users</b></p>
                <button id="unsuspendUser" type="unSuspendUser" class="btb btn-primary">Unsuspend User</button>

            </div>
            <form id="userForm" method="post">
                <div class="suspendList">
                    <?php foreach ($SuspendUserList as $user): ?>
                        <div class="checkbox account-entry"
                             data-user-name="<?php echo htmlspecialchars($user['username']); ?>">
                            <input class="chkbx" type="checkbox" name="user_id[]"
                                   id="account<?php echo $user['user_id']; ?>"
                                   value="<?php echo $user['user_id']; ?>">
                            <label for="account<?php echo $user['user_id']; ?>">
                                <?php echo htmlspecialchars($user['username']); ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </form>
        </div><br>
        <!-- Back Button -->
        <a id="back" href="viewUserAccountListUI.php" class="btn btn-secondary" role="button">Back</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var selectAllCheckbox = document.getElementById('select-all-users');
            var accountCheckboxes = document.querySelectorAll('.chkbx');
            var submitButton = document.getElementById('unsuspendUser');  // 确保使用正确的按钮ID
            var form = document.getElementById('userForm');

            selectAllCheckbox.addEventListener('change', function() {
                accountCheckboxes.forEach(checkbox => checkbox.checked = this.checked);
            });

            accountCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    if (!this.checked) {
                        selectAllCheckbox.checked = false;
                    } else {
                        selectAllCheckbox.checked = Array.from(accountCheckboxes).every(chk => chk.checked);
                    }
                });
            });

            submitButton.addEventListener('click', function() {
                // 清除之前可能添加的隐藏字段
                document.querySelectorAll('.user-id-field').forEach(field => field.remove());

                // 检查是否至少选择了一个用户
                if (Array.from(accountCheckboxes).some(chk => chk.checked)) {
                    // 为每个选中的复选框创建一个隐藏的输入字段
                    Array.from(accountCheckboxes).forEach(function(checkbox) {
                        if (checkbox.checked) {
                            var input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = 'user_id[]';  // PHP中读取的name
                            input.value = checkbox.value;  // 用户ID
                            input.classList.add('user-id-field');  // 添加类以便于清理
                            form.appendChild(input);  // 将隐藏字段添加到表单中
                        }
                    });
                    form.submit();  // 提交表单
                } else {
                    alert("Please select at least one user to unsuspend.");
                }
            });
        });
    </script>

  </body>
</html>