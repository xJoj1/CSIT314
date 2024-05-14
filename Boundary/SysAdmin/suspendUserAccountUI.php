
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suspend Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../styles.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

  <?php
    require_once '../../Controller/SysAdmin/suspendUserAccountController.php';
    session_start();
    $controller = new SuspendUserAccountController();
    $usersFound = false;
    $userList = [];

    if(isset($_GET['data'])){
        $userList =json_decode(urldecode($_GET['data']), true);

        $usersFound = !empty($userList);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm'])) {
        $result = $controller->suspendUserList($userList);
        $message = $result ? "user(s) suspended successfully." : "Failed to suspend user(s).";
        header("Location: viewUserAccountListUI.php?message=" . urlencode($message));
        exit();
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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="userAccMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            User Accounts
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
            <a class="dropdown-item" href="suspendedAccount.php">Suspended Users</a>
        </div>
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

<div class="container AccContain  mt-5">
    <div class="suspend-profile">
        <div class="confirm-suspend mt-5">
            <h1>User Account Suspended</h1>
                <?php if($usersFound): ?>
                        <p><b>User <?php
                                $count = count($userList);
                                $i = 0;
                                foreach ($userList as $user):
                                    echo $user['userName'];
                                    if (++$i !== $count) { // if not the last not add ,
                                        echo ', ';
                                    }
                                endforeach; ?> is suspended</b></p>
                        <form method="POST">
                        <div class="popup-btn mt-5">
                            <a href="viewUserAccountListUI.php" class="button" id="undo-suspend">Undo</a>
                            <button type="submit" name="confirm" class="button">Confirm</button>
                        </div>
                    </form>
                <?php else: ?>
                    <div class="alert alert-warning">Profile not found.</div>
                    <a href="viewUserAccountListUI.php" class="button" id="undo-suspend">Back</a>
                <?php endif; ?>
        </div>
    </div>
</div>