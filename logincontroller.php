<?php 
include("config.php");
$error="";
$msg="";
if(isset($_REQUEST['login']))
{
    $email=$_REQUEST['email'];
    $pass=$_REQUEST['pass'];
    
    
    if(!empty($email) && !empty($pass))
    {
        $sql = "SELECT * FROM user where uemail='$email' && upass='$pass'";
        $result=mysqli_query($con, $sql);
        $row=mysqli_fetch_array($result);
           if($row){
               
                $_SESSION['uid']=$row['uid'];
                $_SESSION['uemail']=$email;
                header("location:index.php");
                
           }
           else{
               $error = "<p class='alert alert-warning'>Email or Password doesnot match!</p> ";
           }
    }else{
        $error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
    }
}
?>
