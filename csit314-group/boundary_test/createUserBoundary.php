<?php

require_once 'app_config.php';
require_once APP_ROOT.'/controller_test/CreateUserController.php';

//listener
if($_SERVER['REQUEST_METHOD'] == 'POST'){

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
    <form action="" method="post">
        <label for="">Name:</label>
        <input type="text" name="name">

        <label for="">Password:</label>
        <input type="text" name="pwd">
        <button type="submit">submit</button>
    </form>
</body>
</html>
