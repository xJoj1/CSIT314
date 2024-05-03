<?php
require_once 'app_config.php';
require_once APP_ROOT . '/controller/AdminUserController.php';
session_start();


function renderUserTable()
{
    $controller = new AdminUserController();
    return $controller->getUserList();
}

//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    $act = $_GET['act'];
//    if ($act == 'del') {
//        var_dump($_POST);
//        $controller = new AdminUserController();
//        $success = $controller->deleteUser($_POST['uid']);
//    }
//}
?>


<?php
$pageTitle = "UserAccounts Manage";
include 'header.php';
?>
<body>

<div class="row" style="margin: 20px">
    <table class="table table-border">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>Option</th>
        </tr>
        </thead>
        <tbody>
        <?php echo renderUserTable() ?>
        </tbody>
    </table>
</div>


<?php include 'footer.php';?>
