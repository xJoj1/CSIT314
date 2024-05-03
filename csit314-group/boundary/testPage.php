<?php
require_once 'app_config.php';
require_once APP_ROOT.'/controller_test/AdminUserController.php';
session_start();


function renderUserTable()
{
    $controller = new AdminUserController();
    return $controller->getUserList();
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>This is a example page to show if it is correct</h1>
<h1><?php echo $_SESSION['user_type']?></h1>

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

</body>
</html>