<?php

use sysAdmin\userAccountsController;

require_once '../app_config.php';
require_once APP_ROOT . '/controller/sysAdmin/createUserAccController.php';
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

//    dump($_POST);
    $createUserAcc = new createUserAccController();
    $createUserAcc->createUserAcc($_POST);
}


?>

<?php
$pageTitle = "Create UserAccounts Accounts";
include APP_ROOT."/boundary/header.php";
?>


<!-- Navigation Bar (Logged In) -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="adminDashboardBoundary.php">Real Estate</a>

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="adminDashboardBoundary.php">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userAccMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    User Accounts
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
                    <a class="dropdown-item" href="suspendedAcc.php">Suspended Users</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="userProfile.php">User Profiles</a>
            </li>
        </ul>
        <!-- Right-aligned dropdown for admin options -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Welcome Admin
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="logout.php">Logout</a> <!-- Link to logout.html -->
                </div>
            </li>
        </ul>
    </nav>
<?php
//include APP_ROOT."/boundary/sysAdmin/navbar.php";
//?>

    <div class="container mt-5">
        <div class="create-container">
            <a href="userAccountsBoundary.php" class="back-arrow">‹</a>
            <h2>Create User Account</h2>
            <form id="userForm" onsubmit="return validateForm()" method="post"> 
                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="name">Name:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="name" name="uname" placeholder="Name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label></label>
                        </div>
                        <div class="col">
                            <div class="col" id="nameError" class="error-message"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="user-id">User ID:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="user-id" name = "uid" placeholder="uid">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label></label>
                        </div>
                        <div class="col">
                            <div class="col" id="userIdError" class="error-message"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="password">Password:</label>
                        </div>
                        <div class="col">
                            <input type="password" id="password" name="upass" placeholder="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label></label>
                        </div>
                        <div class="col">
                            <div class="col" id="passwordError" class="error-message"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="birthdate">Birthdate:</label>
                        </div>
                        <div class="col calendarI row">
                            <input type="date" class = "col" id="birthdate" name = "birthdate" placeholder="DD / MM / YYYY">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label></label>
                        </div>
                        <div class="col">
                            <div class="col" id="birthdateError" class="error-message"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="address">Address:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="address" name = "address" placeholder="Address">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label></label>
                        </div>
                        <div class="col">
                            <div class="col" id="addressError" class="error-message"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="contact">Contact:</label>
                        </div>
                        <div class="col">
                            <input type="tel" id="contact" name = "uphone" placeholder="Contact">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label></label>
                        </div>
                        <div class="col">
                            <div class="col" id="contactError" class="error-message"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="profile-type"  >Profile Type:</label>
                        </div>
                        <div class="col">
                            <select id="profile-type" name="utype">
                                <option value="buyer">Buyer</option>
                                <option value="seller">Seller</option>
                                <option value="agent">Real Estate Agent</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-5">
                    <div class="row">
                        <div class="col-3 m-auto">
                            <button type="submit" class="btn-primary btn-block">Confirm</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- <footer class="container">
        <small>&copy; 2024 Real Estate Dashboard</small>
    </footer> -->

    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var userId = document.getElementById("user-id").value;
            var password = document.getElementById("password").value;
            var birthdate = document.getElementById("birthdate").value;
            var address = document.getElementById("address").value;
            var contact = document.getElementById("contact").value;

            var isValid = true;

            if (name === "") {
                document.getElementById("nameError").innerHTML = "Please enter your name";
                isValid = false;
            } else {
                document.getElementById("nameError").innerHTML = "";
            }

            if (userId === "") {
                document.getElementById("userIdError").innerHTML = "Please enter a user ID";
                isValid = false;
            } else {
                document.getElementById("userIdError").innerHTML = "";
            }

            if (password === "") {
                document.getElementById("passwordError").innerHTML = "Please enter a password";
                isValid = false;
            } else {
                document.getElementById("passwordError").innerHTML = "";
            }

            if (birthdate === "") {
                document.getElementById("birthdateError").innerHTML = "Please enter your birthdate";
                isValid = false;
            } else {
                document.getElementById("birthdateError").innerHTML = "";
            }

            if (address === "") {
                document.getElementById("addressError").innerHTML = "Please enter your address";
                isValid = false;
            } else {
                document.getElementById("addressError").innerHTML = "";
            }

                    if (contact === "") {
                document.getElementById("contactError").innerHTML = "Please enter your contact number";
                isValid = false;
            } else if (contact.length !== 8) { // Check if contact is exactly 8 digits long
                document.getElementById("contactError").innerHTML = "Contact number must be 8 digits long";
                isValid = false;
            } else {
                document.getElementById("contactError").innerHTML = "";
            }
            return isValid;
        }
    </script>

<?php
include APP_ROOT."/boundary/footer.php";
?>