<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User Account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="dashboard.html">Real Estate Mnagement</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="dashboard.html">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userAccMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    User Accounts
                </a>
                <div class="dropdown-menu" aria-labelledby="userAccMenu">
                    <a class="dropdown-item" href="suspendedAcc.html">Suspended Users</a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
                    <a class="dropdown-item" href="logout.html">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Create New User
            </div>
            <div class="card-body">
                <form id="userForm" action="createUserAccController.php" method="post" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Please Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="user-id">User ID:</label>
                        <input type="text" class="form-control" id="user-id" name="user-id" placeholder="Please Enter User ID">
                    </div>
                    <div class="form-group">
                        <label for="password">password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Please Enter Password">
                    </div>
                    <div class="form-group">
                        <label for="birthdate">Birthdate:</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Plese Enter Address">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact:</label>
                        <input type="tel" class="form-control" id="contact" name="contact" placeholder="Please Enter Contact">
                    </div>
                    <div class="form-group">
                        <label for="profile-type">Profile Type:</label>
                        <select class="form-control" id="profile-type" name="profile-type">
                            <option value="buyer">Buyer</option>
                            <option value="seller">Seller</option>
                            <option value="agent">Agent</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Confirm Creation</button>
                </form>
            </div>
        </div>
    </div>

    <script src="validate.js"></script> <!-- Assume a validate.js file exists for client-side validation -->

</body>
</html>
