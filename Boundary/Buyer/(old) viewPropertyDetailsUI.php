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

<style>
   
</style>

<body>
    <?php
    require_once '../../Controller/Buyer/buyerViewDetailsController.php';
    $controller = new buyerViewDetailsController();
    if (isset($_GET['id'])) {
        $propertyId = $_GET['id'];
        $property = $controller->getAllPropertyListings($propertyId);
        if (!$property) {
            header('Location: viewAllProperty.php');
            exit;
        }
    } else {
        header('Location: viewAllProperty.php');
        exit;
    }
    ?>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="buyerDashboard.php">Real Estate</a>
        <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto nav-links-spacing">
                <li class="nav-item">
                    <a class="nav-link active-nav" href="viewAllProperty.php">Property</a>
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
    <div class="container AccContain mt-5">
        <div class="scrollProperty">
            <a href="viewAllProperty.php" class="back-property">‹</a>
            <div class="card property-details-card">
                <img class="card-img-top property-img" src="<?php echo $property['image_url']; ?>" alt="Property Image">
                <div class="detail-container">
                    <p class="light-text"><?php echo $property['description']; ?></p>
                    <h4><b><?php echo '$' . number_format($property['price']); ?></b></h4>
                    <p class="detail-text"><?php echo $property['beds'] . ' bed ' . $property['baths'] . ' bathroom'; ?>
                    </p>
                    <p class="detail-text"><?php echo $property['size'] . ' sqft'; ?></p>
                    <p class="light-text"><?php echo $property['address']; ?></p>
                    <div class="card-footer">
                        <i class="far fa-heart favorite-icon" onclick="toggleFavorite(this)"></i> <!-- Heart icon -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var favIcon = document.querySelector('.favorite-icon');
            if (favIcon) {
                favIcon.addEventListener('click', function () {
                    this.classList.toggle('far');
                    this.classList.toggle('fas');
                    this.classList.toggle('favorited');
                    console.log(this.classList.contains('favorited') ? 'Added to favorites' : 'Removed from favorites');
                });
            }
        });
    </script>
</body>

</html>