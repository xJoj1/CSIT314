<?php
session_start();
include("config.php");

$error = "";

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if (!empty($user) && !empty($pass)) {
        // Query to retrieve admin credentials from the database
        $query = "SELECT * FROM admin WHERE auser='$user'";
        $result = mysqli_query($con, $query) or die(mysqli_error());
        $num_rows = mysqli_num_rows($result);

        if ($num_rows == 1) {
            // Admin user found, fetch the row
            $row = mysqli_fetch_assoc($result);

            // Verify the password
            if ($pass == $row['apass']) {
                // Password is correct, set session and redirect to dashboard
                $_SESSION['auser'] = $user;
                header("Location: dashboard.php");
                exit;
            } else {
                // Password is incorrect
                $error = '* Invalid Password';
            }
        } else {
            // Admin user not found
            $error = '* Invalid User Name';
        }
    } else {
        // Username or password field is empty
        $error = "* Please Fill all the Fields!";
    }
}
?>
