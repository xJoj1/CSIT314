<?php 
include("config.php");
$error="";
$msg="";
if(isset($_REQUEST['reg']))
{
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $phone=$_REQUEST['phone'];
    $pass=$_REQUEST['pass'];
    $utype=$_REQUEST['utype'];
    
    $uimage=$_FILES['uimage']['name'];
    $temp_name1 = $_FILES['uimage']['tmp_name'];
    
    
    $query = "SELECT * FROM user where uemail='$email'";
    $res=mysqli_query($con, $query);
    $num=mysqli_num_rows($res);
    
    if($num == 1)
    {
        $error = "<p class='alert alert-warning'>Email Id already Exist</p> ";
    }
    else
    {
        
        if(!empty($name) && !empty($email) && !empty($phone) && !empty($pass) && !empty($uimage))
        {
            
            $sql="INSERT INTO user (uname,uemail,uphone,upass,utype,uimage) VALUES ('$name','$email','$phone','$pass','$utype','$uimage')";
            $result=mysqli_query($con, $sql);
            move_uploaded_file($temp_name1,"admin/user/$uimage");
               if($result){
                   $msg = "<p class='alert alert-success'>Register Successfully</p> ";
               }
               else{
                   $error = "<p class='alert alert-warning'>Register Not Successfully</p> ";
               }
        }else{
            $error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
        }
    }
    
}
?>
