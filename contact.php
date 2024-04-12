<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Real Estate PHP</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="page-wrapper">
    <?php include("include/header.php"); ?>
    <div class="full-row">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 bg-secondary">
                    <div class="contact-info">
                        <h3 class="mb-4 mt-4 text-white">Contacts</h3>
                        <ul>
                            <li class="d-flex mb-4"> <i class="fas fa-map-marker-alt text-white mr-2 font-13 mt-1"></i>
                                <div class="contact-address">
                                    <h5 class="text-white">Address</h5>
                                    <span class="text-white">27 Ingram Street, Dayton</span>
                                </div>
                            </li>
                            <li class="d-flex mb-4"> <i class="fas fa-phone-alt text-white mr-2 font-13 mt-1"></i>
                                <div class="contact-address">
                                    <h5 class="text-white">Call Us</h5>
                                    <span class="d-table text-white">+1 234-567-8910</span>
                                </div>
                            </li>
                            <li class="d-flex mb-4"> <i class="fas fa-envelope text-white mr-2 font-13 mt-1"></i>
                                <div class="contact-address">
                                    <h5 class="text-white">Email Address</h5>
                                    <span class="d-table text-white">helpline@realestatest.com</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 col-lg-7">
                    <div class="container">
                        <h2 class="text-secondary double-down-line text-center mb-5">Get In Touch</h2>
                        <?php 
                        $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
                        $error = isset($_GET['error']) ? $_GET['error'] : '';
                        echo $msg; 
                        echo $error; 
                        ?>
                        <form class="w-100" action="contactController.php" method="post">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input type="text"  name="name" class="form-control" placeholder="Your Name*">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text"  name="email" class="form-control" placeholder="Email Address*">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text"  name="phone" the="form-control" placeholder="Phone" maxlength="10">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" name="subject"  class="form-control" placeholder="Subject">
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" rows="5" placeholder="Type Comments..."></textarea>
                                    </div>
                                </div>
                                <button type="submit" value="send message" name="send" class="btn btn-success">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("include/footer.php"); ?>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
