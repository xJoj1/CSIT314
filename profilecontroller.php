<?php
session_start();
include("config.php"); // Include file containing database connection

if(!isset($_SESSION['uemail'])) {
    header("location:login.php");
    exit; // Terminate script execution after redirect
}
$error='';
$msg='';

// Fetch user information including profile image path
$uid = $_SESSION['uid'];
$query = mysqli_query($con, "SELECT * FROM `user` WHERE uid='$uid'");
$userData = mysqli_fetch_array($query);

if(isset($_POST['insert']))
{
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $content=$_POST['content'];
    
    if(!empty($name) && !empty($phone) && !empty($content))
    {
        $sql="INSERT INTO feedback (uid,fdescription,status) VALUES ('$uid','$content','0')";
        $result=mysqli_query($con, $sql);
        if($result){
            $msg = "<p class='alert alert-success'>Feedback Send Successfully</p> ";
        }
        else{
            $error = "<p class='alert alert-warning'>Feedback Not Send Successfully</p> ";
        }
    }else{
        $error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
    }
}
?>
