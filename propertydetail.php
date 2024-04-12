<?php 
include("propertydetailcontroller.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta Tags -->
    <!-- remember to comment because its "good practice" -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Real Estate PHP">
    <meta name="keywords" content="">
    <meta name="author" content="Unicoder">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

    <!-- CSS Links -->
    <!-- remember to comment because its "good practice" -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Title -->
    <title>Real Estate PHP</title>
</head>
<body>

<!-- Page Loader -->
<!--
<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
    <div class="d-flex justify-content-center y-middle position-relative">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>
-->

<div id="page-wrapper">
    <div class="row"> 
        <!-- Header start -->
        <?php include("include/header.php");?>
        <!-- Header end -->
        
        <!-- Banner -->
        <!-- Page Banner -->
<div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Property Detail</b></h2>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb" class="float-left float-md-right">
                    <ol class="breadcrumb bg-transparent m-0 p-0">
                        <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Property Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Property Details Section -->
<div class="full-row">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Property Slides -->
                <div id="single-property" style="width:1200px; height:700px; margin:30px auto 50px;">
                    <?php
                    // Display property images as slides
                    for ($i = 18; $i <= 22; $i++) {
                        echo '<div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;">';
                        echo '<img width="1920" height="1080" src="admin/property/' . $row[$i] . '" class="ls-bg" alt="" />';
                        echo '</div>';
                    }
                    ?>
                </div>

                <!-- Property Information -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="bg-success d-table px-3 py-2 rounded text-white text-capitalize">For <?php echo $row['5']; ?></div>
                        <h5 class="mt-2 text-secondary text-capitalize"><?php echo $row['1']; ?></h5>
                        <span class="mb-sm-20 d-block text-capitalize"><i class="fas fa-map-marker-alt text-success font-12"></i> &nbsp;<?php echo $row['14']; ?></span>
                    </div>
                    <div class="col-md-6">
                        <div class="text-success text-left h5 my-2 text-md-right">$<?php echo $row['13']; ?></div>
                        <div class="text-left text-md-right">Price</div>
                    </div>
                </div>

                <!-- Property Details -->
                <div class="property-details">
                    <div class="bg-gray property-quantity px-4 pt-4 w-100">
                        <ul>
                            <li><span class="text-secondary"><?php echo $row['12']; ?></span> Sqft</li>
                            <li><span class="text-secondary"><?php echo $row['6']; ?></span> Bedroom</li>
                            <li><span class="text-secondary"><?php echo $row['7']; ?></span> Bathroom</li>
                            <li><span class="text-secondary"><?php echo $row['8']; ?></span> Balcony</li>
                            <li><span class="text-secondary"><?php echo $row['10']; ?></span> Hall</li>
                            <li><span class="text-secondary"><?php echo $row['9']; ?></span> Kitchen</li>
                        </ul>
                    </div>
                    <h4 class="text-secondary my-4">Description</h4>
                    <p><?php echo $row['2']; ?></p>

                    <!-- Property Summary -->
                    <h5 class="mt-5 mb-4 text-secondary">Property Summary</h5>
                    <div class="table-striped font-14 pb-2">
                        <table class="w-100">
                            <tbody>
                                <tr>
                                    <td>BHK :</td>
                                    <td class="text-capitalize"><?php echo $row['4']; ?></td>
                                    <td>Property Type :</td>
                                    <td class="text-capitalize"><?php echo $row['3']; ?></td>
                                </tr>
                                <tr>
                                    <td>Floor :</td>
                                    <td class="text-capitalize"><?php echo $row['11']; ?></td>
                                    <td>Total Floor :</td>
                                    <td class="text-capitalize"><?php echo $row['28']; ?></td>
                                </tr>
                                <tr>
                                    <td>City :</td>
                                    <td class="text-capitalize"><?php echo $row['15']; ?></td>
                                    <td>State :</td>
                                    <td class="text-capitalize"><?php echo $row['16']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Features -->
                    <h5 class="mt-5 mb-4 text-secondary">Features</h5>
                    <div class="row">
                        <?php echo $row['17']; ?>
                    </div>

                    <!-- Floor Plans -->
                    <h5 class="mt-5 mb-4 text-secondary">Floor Plans</h5>
                    <div class="accordion" id="accordionExample">
                        <!-- Floor Plan buttons and images -->
                        <!-- You can add the logic here to display floor plans -->
                    </div>

                    <!-- Contact Agent -->
                    <h5 class="mt-5 mb-4 text-secondary double-down-line-left position-relative">Contact Agent</h5>
                    <div class="agent-contact pt-60">
                        <div class="row">
                            <div class="col-sm-4 col-lg-3">
                                <img src="admin/user/<?php echo $row['uimage']; ?>" alt="" height="200" width="170">
                            </div>
                            <div class="col-sm-8 col-lg-9">
                                <div class="agent-data text-ordinary mt-sm-20">
                                    <h6 class="text-success text-capitalize"><?php echo $row['uname']; ?></h6>
                                    <ul class="mb-3">
                                        <li><?php echo $row['uphone']; ?></li>
                                        <li><?php echo $row['uemail']; ?></li>
                                    </ul>

                                    <!-- Social media links -->
                                    <div class="mt-3 text-secondary hover-text-success">
                                        <ul>
                                            <li class="float-left mr-3"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li class="float-left mr-3"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li class="float-left mr-3"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                            <li class="float-left mr-3"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li class="float-left mr-3"><a href="#"><i class="fas fa-rss"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Instalment Calculator -->
                <h4 class="double-down-line-left text-secondary position-relative pb-4 my-4">Instalment Calculator</h4>
                <form class="d-inline-block w-100" action="calc.php" method="post">
                    <!-- Calculator form fields -->
                </form>

                <!-- Featured Properties -->
                <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4 mt-5">Featured Property</h4>
                <ul class="property_list_widget">
                    <!-- Display featured properties -->
                </ul>

                <!-- Recently Added Properties -->
                <div class="sidebar-widget mt-5">
                    <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Recently Added Property</h4>
                    <ul class="property_list_widget">
                        <!-- Display recently added properties -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Footer start -->
        <?php include("include/footer.php");?>
        <!-- Footer end -->

        <!-- Scroll to top --> 
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
    </div>
</div>

<!-- JS Links -->
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
