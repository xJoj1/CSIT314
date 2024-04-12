<?php 

include("propertygridcontroller.php");

///search code
	
?><!-- remember to comment because its "good practice" -->
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Real Estate PHP">
<meta name="keywords" content="">
<meta name="author" content="Unicoder">
<link rel="shortcut icon" href="images/favicon.ico">

<!--	Fonts
	========================================================-->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link
	========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<!--	Title
	=========================================================-->
<title>Real Estate PHP</title>
</head>
<body>

<!--	Page Loader
=============================================================
<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
	<div class="d-flex justify-content-center y-middle position-relative">
	  <div class="spinner-border" role="status">
		<span class="sr-only">Loading...</span>
	  </div>
	</div>
</div>
--> 


<body>
    <!-- Header -->
    <?php include("include/header.php"); ?>

    <!-- Banner -->
    <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Filter Property</b></h2>
                </div>
                <div class="col-md-6">
                    <nav aria-label="breadcrumb" class="float-left float-md-right">
                        <ol class="breadcrumb bg-transparent m-0 p-0">
                            <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Filter Property</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Property Grid -->
    <div class="full-row">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <!-- Display Property Grid -->
                        <?php foreach ($properties as $property) { ?>
                            <div class="col-md-6">
                                <!-- Property Card -->
                                <div class="featured-thumb hover-zoomer mb-4">
                                    <!-- Property Image -->
                                    <div class="overlay-black overflow-hidden position-relative">
                                        <img src="admin/property/<?php echo $property['image'];?>" alt="Property Image">
                                        <!-- Sale/Rent Badge -->
                                        <div class="sale bg-success text-white">For <?php echo $property['status'];?></div>
                                        <!-- Property Price -->
                                        <div class="price text-primary text-capitalize">$<?php echo $property['price'];?> <span class="text-white"><?php echo $property['size'];?> Sqft</span></div>
                                    </div>
                                    <!-- Property Details -->
                                    <div class="featured-thumb-data shadow-one">
                                        <div class="p-4">
                                            <!-- Property Title -->
                                            <h5 class="text-secondary hover-text-success mb-2 text-capitalize">
                                                <a href="propertydetail.php?pid=<?php echo $property['id'];?>"><?php echo $property['title'];?></a>
                                            </h5>
                                            <!-- Property Location -->
                                            <span class="location text-capitalize">
                                                <i class="fas fa-map-marker-alt text-success"></i> <?php echo $property['location'];?>
                                            </span>
                                        </div>
                                        <div class="px-4 pb-4 d-inline-block w-100">
                                            <!-- Seller Information -->
                                            <div class="float-left text-capitalize">
                                                <i class="fas fa-user text-success mr-1"></i>By: <?php echo $property['seller'];?>
                                            </div>
                                            <!-- Listing Date -->
                                            <div class="float-right">
                                                <i class="far fa-calendar-alt text-success mr-1"></i><?php echo date('d-m-Y', strtotime($property['date']));?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Instalment Calculator -->
                    <h4 class="double-down-line-left text-secondary position-relative pb-4 my-4">Instalment Calculator</h4>
                    <form class="d-inline-block w-100" action="calc.php" method="post">
                        <!-- Calculator form fields -->
                        <!-- Property Amount -->
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="text" class="form-control" name="amount" placeholder="Property Price">
                        </div>
                        <!-- Duration (Months) -->
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                            </div>
                            <input type="text" class="form-control" name="month" placeholder="Duration (Months)">
                        </div>
                        <!-- Interest Rate (%) -->
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">%</div>
                            </div>
                            <input type="text" class="form-control" name="interest" placeholder="Interest Rate">
                        </div>
                        <!-- Calculate Button -->
                        <button type="submit" value="submit" name="calc" class="btn btn-danger mt-4">Calculate Instalment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        
        <!--	Footer   start-->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->
        
        <!-- Scroll to top --> 
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
    </div>
</div>
<!-- Wrapper End --> 

<!--	Js Link
============================================================--> 
<script src="js/jquery.min.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/greensock.js"></script> 
<script src="js/layerslider.transitions.js"></script> 
<script src="js/layerslider.kreaturamedia.jquery.js"></script> 
<!--jQuery Layer Slider --> 
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