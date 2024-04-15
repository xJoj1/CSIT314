<?php include("indexController.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Good practice to comment -->
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

    <!-- CSS Links -->
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
    <!--<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
        <div class="d-flex justify-content-center y-middle position-relative">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>-->
    <!-- End of Page Loader -->

    <div id="page-wrapper">
        <div class="row">
            <!-- Header Start -->
            <?php include("include/header.php"); ?>
            <!-- Header End -->

            <!-- Banner Start -->
            <div class="overlay-black w-100 slider-banner1 position-relative" style="background-image: url('images/banner/rshmpg.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-12">
                            <div class="text-white">
                                <h1 class="mb-4"><span class="text-success">Let us</span><br>Guide you Home</h1>
                                <form method="post" action="propertygrid.php">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-2">
                                            <div class="form-group">
                                                <select class="form-control" name="type">
                                                    <option value="">Select Type</option>
                                                    <option value="apartment">Apartment</option>
                                                    <option value="flat">Flat</option>
                                                    <option value="building">Building</option>
                                                    <option value="house">House</option>
                                                    <option value="villa">Villa</option>
                                                    <option value="office">Office</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-2">
                                            <div class="form-group">
                                                <select class="form-control" name="stype">
                                                    <option value="">Select Status</option>
                                                    <option value="rent">Rent</option>
                                                    <option value="sale">Sale</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="city" placeholder="Enter City" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-2">
                                            <div class="form-group">
                                                <button type="submit" name="filter" class="btn btn-success w-100">Search Property</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner End -->

            <!-- Text Block One -->
            <div class="full-row bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12"> <!-- Remember to comment because it's "good practice" -->
                            <h2 class="text-secondary double-down-line text-center mb-5">What We Do</h2>
                        </div>
                    </div>
                    <div class="text-box-one">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transition-3s"> 
                                    <i class="flaticon-rent text-success flat-medium" aria-hidden="true"></i>
                                    <h5 class="text-secondary hover-text-success py-3 m-0"><a href="#">Selling Service</a></h5>
                                    <p>This is a dummy text for filling out spaces. Just some random words...</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transition-3s"> 
                                    <i class="flaticon-for-rent text-success flat-medium" aria-hidden="true"></i>
                                    <h5 class="text-secondary hover-text-success py-3 m-0"><a href="#">Rental Service</a></h5>
                                    <p>This is a dummy text for filling out spaces. Just some random words...</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transition-3s"> 
                                    <i class="flaticon-list text-success flat-medium" aria-hidden="true"></i>
                                    <h5 class="text-secondary hover-text-success py-3 m-0"><a href="#">Property Listing</a></h5>
                                    <p>This is a dummy text for filling out spaces. Just some random words...</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transition-3s"> 
                                    <i class="flaticon-diagram text-success flat-medium" aria-hidden="true"></i>
                                    <h5 class="text-secondary hover-text-success py-3 m-0"><a href="#">Legal Investment</a></h5>
                                    <p>This is a dummy text for filling out spaces. Just some random words...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Text Block One -->

            <!-- Recent Properties -->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-secondary double-down-line text-center mb-4">Recent Property</h2>
                        </div>
                        <div class="col-md-12"><!-- Remember to comment because it's good practice -->
                            <div class="tab-content mt-4" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home">
                                    <div class="row">
                                        <?php
                                        // Assumed SQL query in controller part to fetch data
                                        $properties = getRecentProperties();
                                        // var_dump($properties);
                                        foreach ($properties as $property) {
                                            // Display each property
                                            echo '<div class="col-md-6 col-lg-4">';
                                            echo '<div class="featured-thumb hover-zoomer mb-4">';
                                            echo '<div class="overlay-black overflow-hidden position-relative"> <img src="admin/property/' . $property['pimage'] . '" alt="pimage">';
                                            echo '<div class="featured bg-success text-white">New</div>';
                                            echo '<div class="sale bg-success text-white text-capitalize">For ' . $property['status'] . '</div>';
                                            echo '<div class="price text-primary"><b>$' . $property['price'] . ' </b><span class="text-white">' . $property['size'] . ' Sqft</span></div>';
                                            echo '</div>';
                                            echo '<div class="featured-thumb-data shadow-one">';
                                            echo '<div class="p-3">';
                                            echo '<h5 class="text-secondary hover-text-success mb-2 text-capitalize"><a href="propertydetail.php?pid=' . $property['pid'] . '">' . $property['title'] . '</a></h5>';
                                            echo '<span class="location text-capitalize"><i class="fas fa-map-marker-alt text-success"></i> ' . $property['location'] . '</span>';
                                            echo '</div>';
                                            echo '<div class="bg-gray quantity px-4 pt-4">';
                                            echo '<ul>';
                                            echo '<li><span>' . $property['size'] . '</span> Sqft</li>';
                                            echo '<li><span>' . $property['bedroom'] . '</span> Beds</li>';
                                            echo '<li><span>' . $property['bathroom'] . '</span> Baths</li>';
                                            echo '<li><span>' . $property['kitchen'] . '</span> Kitchen</li>';
                                            echo '<li><span>' . $property['balcony'] . '</span> Balcony</li>';
                                            echo '</ul>';
                                            echo '</div>';
                                            echo '<div class="p-4 d-inline-block w-100">';
                                            echo '<div class="float-left text-capitalize"><i class="fas fa-user text-success mr-1"></i>By : ' . $property['uname'] . '</div>';
                                            echo '<div class="float-right"><i class="far fa-calendar-alt text-success mr-1"></i> ' . date('d-m-Y', strtotime($property['date'])) . '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Recent Properties -->
            
            <!-- Why Choose Us -->
            <div class="full-row living bg-one overlay-secondary-half" style="background-image: url('images/01.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="living-list pr-4">
                                <h3 class="pb-4 mb-3 text-white">Why Choose Us</h3>
                                <ul>
                                    <li class="mb-4 text-white d-flex"> 
                                        <i class="flaticon-reward flat-medium float-left d-table mr-4 text-success" aria-hidden="true"></i>
                                        <div class="pl-2">
                                            <h5 class="mb-3">Top Rated</h5>
                                            <p>This is a dummy text for filling out spaces. This is just a dummy text for filling out blank spaces.</p>
                                        </div>
                                    </li>
                                    <li class="mb-4 text-white d-flex"> 
                                        <i class="flaticon-real-estate flat-medium float-left d-table mr-4 text-success" aria-hidden="true"></i>
                                        <div class="pl-2">
                                            <h5 class="mb-3">Experience Quality</h5>
                                            <p>This is a dummy text for filling out spaces. This is just a dummy text for filling out blank spaces.</p>
                                        </div>
                                    </li>
                                    <li class="mb-4 text-white d-flex"> 
                                        <i class="flaticon-seller flat-medium float-left d-table mr-4 text-success" aria-hidden="true"></i>
                                        <div class="pl-2">
                                            <h5 class="mb-3">Experienced Agents</h5>
                                            <p>This is a dummy text for filling out spaces. This is just a dummy text for filling out blank spaces.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Why Choose Us -->

            <!-- How It Work -->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center mb-5">How It Work</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-thumb-one text-center mb-5">
                                <div class="bg-success text-white rounded-circle position-absolute z-index-9">1</div>
                                <div class="left-arrow"><i class="flaticon-investor flat-medium icon-success" aria-hidden="true"></i></div>
                                <h5 class="text-secondary mt-5 mb-4">Discussion</h5>
                                <p>Nascetur cubilia sociosqu aliquet ut elit nascetur nullam duis tincidunt nisl non quisque vestibulum platea ornare ridiculus.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="icon-thumb-one text-center mb-5">
                                <div class="bg-success text-white rounded-circle position-absolute z-index-9">2</div>
                                <div class="left-arrow"><i class="flaticon-search flat-medium icon-success" aria-hidden="true"></i></div>
                                <h5 class="text-secondary mt-5 mb-4">Files Review</h5>
                                <p>Nascetur cubilia sociosqu aliquet ut elit nascetur nullam duis tincidunt nisl non quisque vestibulum platea ornare ridiculus.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="icon-thumb-one text-center mb-5">
                                <div class="bg-success text-white rounded-circle position-absolute z-index-9">3</div>
                                <div><i class="flaticon-handshake flat-medium icon-success" aria-hidden="true"></i></div>
                                <h5 class="text-secondary mt-5 mb-4">Acquire</h5>
                                <p>Nascetur cubilia sociosqu aliquet ut elit nascetur nullam duis tincidunt nisl non quisque vestibulum platea ornare ridiculus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End How It Work -->

            <!-- Achievement -->
            <div class="full-row overlay-secondary" style="background-image: url('images/breadcromb.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                <div class="container">
                    <div class="fact-counter">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="count wow text-center mb-sm-50" data-wow-duration="300ms"> 
                                    <i class="flaticon-house flat-large text-white" aria-hidden="true"></i>
                                    <?php
                                    $query = mysqli_query($con, "SELECT count(pid) FROM property");
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo '<div class="count-num text-success my-4" data-speed="3000" data-stop="' . $row[0] . '">0</div>';
                                    }
                                    ?>
                                    <div class="text-white h5">Property Available</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count wow text-center mb-sm-50" data-wow-duration="300ms"> 
                                    <i class="flaticon-house flat-large text-white" aria-hidden="true"></i>
                                    <?php
                                    $query = mysqli_query($con, "SELECT count(pid) FROM property where stype='sale'");
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo '<div class="count-num text-success my-4" data-speed="3000" data-stop="' . $row[0] . '">0</div>';
                                    }
                                    ?>
                                    <div class="text-white h5">Sale Property Available</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count wow text-center mb-sm-50" data-wow-duration="300ms"> 
                                    <i class="flaticon-house flat-large text-white" aria-hidden="true"></i>
                                    <?php
                                    $query = mysqli_query($con, "SELECT count(pid) FROM property where stype='rent'");
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo '<div class="count-num text-success my-4" data-speed="3000" data-stop="' . $row[0] . '">0</div>';
                                    }
                                    ?>
                                    <div class="text-white h5">Rent Property Available</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count wow text-center mb-sm-50" data-wow-duration="300ms"> 
                                    <i class="flaticon-man flat-large text-white" aria-hidden="true"></i>
                                    <?php
                                    $query = mysqli_query($con, "SELECT count(uid) FROM user");
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo '<div class="count-num text-success my-4" data-speed="3000" data-stop="' . $row[0] . '">0</div>';
                                    }
                                    ?>
                                    <div class="text-white h5">Registered Users</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Achievement -->
             
            
            <!-- Popular Places -->
            <div class="full-row bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center mb-5">Popular Places</h2>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-6 col-lg-3 pb-1">
                                    <div class="overflow-hidden position-relative overlay-secondary hover-zoomer mx-n13 z-index-9">
                                        <img src="images/thumbnail4/1.jpg" alt="">
                                        <div class="text-white xy-center z-index-9 position-absolute text-center w-100">
                                            <?php
                                            $query = mysqli_query($con, "SELECT count(state), property.* FROM property where city='Olisphis'");
                                            while ($row = mysqli_fetch_array($query)) {
                                                echo '<h4 class="hover-text-success text-capitalize"><a href="stateproperty.php?id=' . $row['17'] . '">' . $row['state'] . '</a></h4>
                                                <span>' . $row[0] . ' Properties Listed</span>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 pb-1">
                                    <div class="overflow-hidden position-relative overlay-secondary hover-zoomer mx-n13 z-index-9">
                                        <img src="images/thumbnail4/2.jpg" alt="">
                                        <div class="text-white xy-center z-index-9 position-absolute text-center w-100">
                                            <?php
                                            $query = mysqli_query($con, "SELECT count(state), property.* FROM property where city='Awrerton'");
                                            while ($row = mysqli_fetch_array($query)) {
                                                echo '<h4 class="hover-text-success text-capitalize"><a href="stateproperty.php?id=' . $row['17'] . '">' . $row['state'] . '</a></h4>
                                                <span>' . $row[0] . ' Properties Listed</span>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 pb-1">
                                    <div class="overflow-hidden position-relative overlay-secondary hover-zoomer mx-n13 z-index-9">
                                        <img src="images/thumbnail4/3.jpg" alt="">
                                        <div class="text-white xy-center z-index-9 position-absolute text-center w-100">
                                            <?php
                                            $query = mysqli_query($con, "SELECT count(state), property.* FROM property where city='Floson'");
                                            while ($row = mysqli_fetch_array($query)) {
                                                echo '<h4 class="hover-text-success text-capitalize"><a href="stateproperty.php?id=' . $row['17'] . '">' . $row['state'] . '</a></h4>
                                                <span>' . $row[0] . ' Properties Listed</span>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 pb-1">
                                    <div class="overflow-hidden position-relative overlay-secondary hover-zoomer mx-n13 z-index-9">
                                        <img src="images/thumbnail4/4.jpg" alt="">
                                        <div class="text-white xy-center z-index-9 position-absolute text-center w-100">
                                            <?php
                                            $query = mysqli_query($con, "SELECT count(state), property.* FROM property where city='Ulmore'");
                                            while ($row = mysqli_fetch_array($query)) {
                                                echo '<h4 class="hover-text-success text-capitalize"><a href="stateproperty.php?id=' . $row['17'] . '">' . $row['state'] . '</a></h4>
                                                <span>' . $row[0] . ' Properties Listed</span>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Popular Places -->

            
            <!-- Testimonial -->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="content-sidebar p-4">
                                <div class="mb-3 col-lg-12">
                                    <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Testimonial</h4>
                                    <div class="recent-review owl-carousel owl-dots-gray owl-dots-hover-success">
                                        <?php
                                        $query = mysqli_query($con, "select feedback.*, user.* from feedback, user where feedback.uid = user.uid and feedback.status = '1'");
                                        while ($row = mysqli_fetch_array($query)) {
                                            echo '<div class="item">
                                                    <div class="p-4 bg-success down-angle-white position-relative">
                                                        <p class="text-white"><i class="fas fa-quote-left mr-2 text-white"></i>' . $row['fdescription'] . '. <i class="fas fa-quote-right mr-2 text-white"></i></p>
                                                    </div>
                                                    <div class="p-2 mt-4">
                                                        <span class="text-success d-table text-capitalize">' . $row['uname'] . '</span> <span class="text-capitalize">' . $row['utype'] . '</span>
                                                    </div>
                                                </div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Testimonial -->
                            
            <!-- Footer Start -->
            <?php include("include/footer.php"); ?>
            <!-- Footer End -->

            <!-- Scroll to Top Button -->
            <a href="#" class="bg-success text-white hover-text-secondary" id="scroll">
                <i class="fas fa-angle-up"></i>
            </a>
            <!-- End Scroll to Top Button -->

        </div>
    </div>
     <!-- Weapper end-->                                   

    <!-- Scripts -->
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
    <script src="js/YouTubePopUp.jquery.js"></script> 
    <script src="js/validate.js"></script> 
    <script src="js/jquery.cookie.js"></script> 
    <script src="js/custom.js"></script>
</body>
</html>
