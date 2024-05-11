<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create User Accounts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../styles.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

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
                <a class="dropdown-item" href="suspendedAcc.php">Suspended Users</a>
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

    <div class="container mt-5">
        <div class="create-container">
            <a href="userAccounts.php" class="back-arrow">‹</a>
            <h2>Create User Account</h2>
            <form id="userForm" onsubmit="return validateForm()" method="post"> 
                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="name">Name:</label>
                        </div>
                        <div class="col">
                            <input type="text" id="name" placeholder="Name">
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
                            <input type="text" id="user-id" placeholder="uid">
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
                            <input type="password" id="password" placeholder="password">
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
                            <input type="date" class="col" id="birthdate" placeholder="DD / MM / YYYY">
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
                            <input type="text" id="address" placeholder="Address">
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
                            <input type="tel" id="contact" placeholder="Contact">
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
                            <label for="profile-type">Profile Type:</label>
                        </div>
                        <div class="col">
                            <select id="profile-type">
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

</body>
</html>
