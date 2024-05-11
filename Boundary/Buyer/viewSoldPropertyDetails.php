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
    require_once '../../Controller/Buyer/viewSoldPropertyDetailsController.php';
    $controller = new viewSoldPropertyDetailsController();
    $propertyId = $_GET['id'] ?? null;
    $listing = $controller->handlePropertyRequest($propertyId);
    ?>

    <!-- Navigation Bar (Logged In) -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="buyerDashboard.php">Real Estate</a>
        <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto nav-links-spacing">
                <li class="nav-item">
                    <a class="nav-link" href="buyerDashboard.php">Property</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mortgageCalculatorUI.php">Mortgage Calculator</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="buyerRateAndReviewUI.php">Rating/Review</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Welcome Buyer
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../../logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Property Details -->
    <div class="container AccContain mt-5">
        <div class="scrollProperty">
            <?php if (!$listing): ?>
                <p>Property not found.</p>
            <?php else: ?>
                <a href="viewSoldPropertyUI.php" class="back-property">‹ Back to Sold Properties</a>
                <div class="card property-details-card">
                    <img class="card-img-top property-img" src="<?php echo $listing['image_url']; ?>" alt="Property Image">
                    <div class="detail-container">
                        <p class="light-text"><?php echo $listing['description']; ?></p>
                        <h4><b>$<?php echo number_format($listing['price']); ?></b></h4>
                        <p class="detail-text">
                            <?php echo $listing['beds'] . ' bed, ' . $listing['baths'] . ' bathroom'; ?>
                        </p>
                        <p class="detail-text"><?php echo $listing['size'] . ' sqft'; ?></p>
                        <p class="light-text"><?php echo $listing['address']; ?></p>
                    </div>
                    <div class="card-footer">
                        <i class="far fa-heart favorite-icon" onclick="toggleFavorite(this)"></i>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function toggleFavorite(element) {
            element.classList.toggle('far');
            element.classList.toggle('fas');
            element.classList.toggle('favorited');
            if (element.classList.contains('favorited')) {
                console.log('Added to favorites');
            } else {
                console.log('Removed from favorites');
            }
        }
        
    </script>

</body>

</html>