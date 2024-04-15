<?php
session.start()
include("config.php");

$error = "";
$msg = "";

if (isset($_POST['insert'])) {
    // Get form inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];

    // Validate form inputs
    if (!empty($name) && !empty($email) && !empty($pass) && !empty($dob) && !empty($phone)) {
        // Insert data into the database
        $sql = "INSERT INTO admin (auser, aemail, apass, adob, aphone) VALUES ('$name', '$email', '$pass', '$dob', '$phone')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            // Redirect to admin login page after successful registration
            header("Location: index.php");
            exit;
        } else {
            $error = 'Failed to register admin. Please try again.';
        }
    } else {
        $error = "Please fill in all the fields.";
    }
}
?>
