<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Property Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../../styles.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  
<?php
  require_once '../../Controller/Seller/sellerViewListingDetailsController.php';
  $controller = new SellerViewPropertyDetailsController();
  $property = $controller->handlePropertyRequest();

?>

<!-- Navigation Bar (Logged In) -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="sellerDashboard.php">Real Estate</a>
    <!-- Links -->
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="sellerDashboard.php">Home</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userAccMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Property Listing
            </a>
            <div class="dropdown-menu" aria-labelledby="userAccMenu">
                <a class="dropdown-item" href="sellerViewListingUI.php">Listed Property</a>
                <a class="dropdown-item" href="sellerSoldPropertyUI.php">Sold Property</a>
                <a class="dropdown-item" href="sellerTrackEngagementUI.php">Engagement Metrics</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="sellerRateAndReviewUI.php">Rate/Review</a>
        </li>
    </ul>
    <!-- Right-aligned dropdown for admin options -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Welcome Seller
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
                <a class="dropdown-item" href="../../logout.php">Logout</a>
            </div>
        </li>
    </ul>
</nav>

<!-- Property Details -->
<div class="container AccContain mt-5">
    <div class="scrollProperty">
        <a href="sellerSoldPropertyUI.php" class="back-property">‹ Back to Listings</a>
        <div class="card property-details-card">
            <img class="card-img-top property-img" src="<?php echo $property['image_url']; ?>" alt="Property Image">
            <div class="detail-container">
                <p class="light-text"><?php echo $property['description']; ?></p>
                <h4><b><?php echo '$' . number_format($property['price']); ?></b></h4>
                <p class="detail-text"><?php echo $property['beds'] . ' bed, ' . $property['baths'] . ' bathroom'; ?></p>
                <p class="detail-text"><?php echo $property['size'] . ' sqft'; ?></p>
                <p class="light-text"><?php echo $property['address']; ?></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
