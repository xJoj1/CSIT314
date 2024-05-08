<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Property Listing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../styles.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
        require_once '../../Controller/REagent/viewPropertyListingController.php';
        
        $controller = new ViewPropertyListingController();
        $listings = $controller->getAllListings();
    ?>

    <!-- Navigation Bar (Logged In) -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="REdashboard.php">Real Estate</a>

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
        <a class="nav-link" href="REdashboard.php">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="viewPropertyListingUI.php">House Listing</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="viewRatingReview.php">Rating/Review</a>
        </li>
    </ul>
        <!-- Right-aligned dropdown for admin options -->
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Welcome Agent
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
            <a class="dropdown-item" href="../../logout.php">Logout</a> <!-- Link to logout.php -->
            </div>
        </li>
        </ul>
    </nav>

<!-- Account List -->
<div class="container AccContain  mt-5">
    <!-- Search Bar -->
    <div class="search-container2">
        <div class="user-buttons2">
            <a href="searchPropertyListingUI.php" class="button">Search Listing</a>
            <a href="createPropertyListingUI.php" class="button">Create Listing</a>
            <a href="removePropertyListingUI.php" class="button">Remove Listing</a>
            <a href="" class="button">Update Listing</a>
        </div>
    </div>

    <!-- Property Listings -->
        <div class="listing-container">
            <div class="scrollList">
                <div class="row">
                    <?php foreach ($listings as $listing): ?>
                        <!-- Sample Property Card -->
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-img-top-container">
                                    <img class="card-img-top" src="<?= $listing['image_url'] ?: 'placeholder-image.jpg'; ?>" alt="Property Image">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $listing['address']; ?></h5>
                                    <p class="card-text"><?= $listing['price']; ?> - <?= $listing['size']; ?> sqft <?= $listing['beds']; ?> bed <?= $listing['baths']; ?> bathroom</p>
                                    <a href="../../Boundary/REagent/viewPropertyDetailsUI.php?id=<?php echo $listing['id']; ?>"
                                        class="btn btn-primary">View Details</a>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div> 
            </div>
        </div>  
    </form>
</div>

    
</body>
</html>
