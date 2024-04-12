<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("propertycontroller.php");
///code								
?><!-- remember to comment because its "good practice" -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Explore top properties with Real Estate PHP">
    <meta name="author" content="Unicoder">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">

    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Real Estate PHP</title>
</head>
<body>
<div id="page-wrapper">
    <div class="row">
        <!-- Header -->
        <?php include("include/header.php"); ?>

        <!-- Property Grid Section -->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <!-- Display property data loaded from an external PHP script -->
                    <?php foreach ($propertyGrid as $property): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="property-item shadow-sm">
                            <div class="property-image">
                                <img src="admin/property/<?php echo $property['pimage'];?>" alt="property image" class="img-fluid">
                                <div class="tag button alt featured"><?php echo $property['stype'];?></div>
                                <div class="price"><span>$<?php echo number_format($property['price']);?></span></div>
                            </div>
                            <div class="property-content">
                                <h5><a href="propertydetail.php?pid=<?php echo $property['pid'];?>" class="title"><?php echo $property['title'];?></a></h5>
                                <span class="location"><i class="fas fa-map-marker-alt"></i> <?php echo $property['location'];?></span>
                                <p class="description"><?php echo substr($property['pcontent'], 0, 100) . '...'; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include("include/footer.php"); ?>
    </div>
</div>

<!-- JavaScript Links -->
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
