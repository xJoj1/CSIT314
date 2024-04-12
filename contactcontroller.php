<?php
include("config.php");

$error = "";
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    if (!empty($name) && !empty($email) && !empty($phone) && !empty($subject) && !empty($message)) {
        $sql = "INSERT INTO contact (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $subject, $message);
        
        if (mysqli_stmt_execute($stmt)) {
            $msg = "<p class='alert alert-success'>Message Sent Successfully</p>";
        } else {
            $error = "<p class='alert alert-warning'>Message Not Sent Successfully</p>";
        }
        mysqli_stmt_close($stmt);
    } else {
        $error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
    }
    // Redirect back to the contact form with the message and error status
    header("Location: contact.php?msg=" . urlencode($msg) . "&error=" . urlencode($error));
    exit;
}
?>
