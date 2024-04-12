<?php 
include("registercontroller.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta Tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
    <!-- Css Link -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Real Estate PHP</title>
</head>
<body>
    <div id="page-wrapper">
        <div class="row"> 
            <!-- Header start  -->
            <?php include("include/header.php");?>
            <!-- Header end  -->
            <!-- Banner   -->
            <!-- <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Register</b></h2>
                        </div>
                        <div class="col-md-6">
                            <nav aria-label="breadcrumb" class="float-left float-md-right">
                                <ol class="breadcrumb bg-transparent m-0 p-0">
                                    <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Register</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div> -->
             <!-- Banner   -->
            <div class="page-wrappers login-body full-row bg-gray">
                <div class="login-wrapper">
                    <div class="container">
                        <div class="loginbox">
                            <div class="login-right">
                                <div class="login-right-wrap">
                                    <h1>Register</h1>
                                    <p class="account-subtitle">Access to our dashboard</p>
                                    <?php echo $error; ?><?php echo $msg; ?>
                                    <!-- Form -->
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text"  name="name" class="form-control" placeholder="Your Name*">
                                        </div>
                                        <div class="form-group">
                                            <input type="email"  name="email" class="form-control" placeholder="Your Email*">
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  name="phone" class="form-control" placeholder="Your Phone*" maxlength="10">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pass"  class="form-control" placeholder="Your Password*">
                                        </div>
                                         <div class="form-check-inline">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="utype" value="user" checked>User
                                          </label>
                                        </div>
                                        <div class="form-check-inline">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="utype" value="agent">Agent
                                          </label>
                                        </div>
                                        <div class="form-check-inline disabled">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="utype" value="builder">Builder
                                          </label>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-form-label"><b>User Image</b></label>
                                            <input class="form-control" name="uimage" type="file">
                                        </div>
                                        <button class="btn btn-success" name="reg" value="Register" type="submit">Register</button>
                                    </form>
                                    <div class="login-or">
                                        <span class="or-line"></span>
                                        <span class="span-or">or</span>
                                    </div>
                                    <div class="text-center dont-have">Already have an account? <a href="login.php">Login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Footer   start-->
        <?php include("include/footer.php");?>
        <!-- Footer   start-->
        <!-- Scroll to top --> 
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
    </div>
</div>
<!-- Wrapper End --> 
<!-- Js Link -->
<script src="js/jquery.min.js"></script> 
<script src="js/greensock.js"></script> 
<script src="js/layerslider.transitions.js"></script> 
<script src="js/layerslider.kreaturamedia.jquery.js"></script> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/tmpl.js"></script> 
<script src="js/jquery.dependClass-0.1.js"></script> 
<script src="js/draggable-0.1.js"></script> 
<script src="js/jquery.slider.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/custom.js"></script>
</body>
</html>
