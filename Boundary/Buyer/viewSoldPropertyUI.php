<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View all Properties</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../../styles.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nouislider/distribute/nouislider.min.css">
    <script src="https://cdn.jsdelivr.net/npm/nouislider/distribute/nouislider.min.js"></script>
</head>

<body>

    <?php
    require_once '../../Entity/PropertyListing.php';
    $propertyListing = new PropertyListing();

    $properties = $propertyListing->getSoldListings();

    if (!is_array($properties)) {

        $properties = [];
    }
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
                    <a class="nav-link active-nav" href="buyerDashboard.php">Property</a>
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Welcome Buyer
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../../logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="container-fluid mt-5">
        <div class="row">
            <!-- Filter Sidebar -->
            <div class="col-md-3">
                <div class="filter-sidebar">
                    <div class="row">
                        <div class="col-6">
                            <h5><b>Filter</b></h5>
                        </div>
                    </div>
                    <div class="filter-group">
                        <input type="radio" name="status" value="new" class="toggle-radio" id="statusNew">
                        <label for="statusNew">New</label>
                    </div>
                    <div class="filter-group">
                        <input type="radio" name="status" value="sold" class="toggle-radio" id="statusSold" checked>
                        <label for="statusSold">Sold</label>
                    </div>
                    <div class="range-group">
                        <div class="price-range">
                            <h5><b>Price Range</b></h5>
                        </div>
                        <div id="priceSlider"></div>
                    </div>
                    <button class="btn filter-button" onclick="applyFilters()">Apply Filters</button>
                </div>
            </div>

            <!-- Search and Listings -->
            <div class="col-md-8 flexible-width">
                <!-- Search Bar and Button Container -->
                <h1> View Sold Properties </h1>
                <div class="search-border">
                    <!-- Button on the right -->
                    <div class="user-buttons3">
                        <a href="searchSoldPropertyUI.php" class="button">Search Property</a>
                        <a href="savedSoldPropertyUI.php" class="button">Saved Property</a>
                    </div>
                </div>
                <!-- Property Listings -->
                <div class="container mt-5">
                    <div class="listing-container">
                        <div class="scrollList">
                            <div class="row">
                                <?php foreach ($properties as $property) : ?>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img class="card-img-top" src="<?php echo $property['image_url']; ?>" alt="Property Image">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $property['address']; ?></h5>
                                                <p class="card-text">
                                                    <?php echo '$' . number_format($property['price']) . ' - ' . $property['size'] . ' sqft ' . $property['beds'] . ' bed ' . $property['baths'] . ' bathroom'; ?>
                                                </p>
                                                <a href="viewPropertyDetailsUI.php?id=<?php echo $property['id']; ?>" class="btn btn-primary">View Details</a>
                                            </div>
                                            <div class="card-footer">
                                                <i class="far fa-heart favorite-icon" onclick="toggleFavorite(this)"></i>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

        document.addEventListener('DOMContentLoaded', function() {
            var priceSlider = document.getElementById('priceSlider');
            noUiSlider.create(priceSlider, {
                start: [100000, 500000],
                connect: true,
                range: {
                    'min': 100000,
                    'max': 999999
                },
                step: 1000,
                tooltips: [true, true],
                format: {
                    to: function(value) {
                        return parseInt(value).toLocaleString();
                    },
                    from: function(value) {
                        return Number(value.replace(',', ''));
                    }
                }
            });

            document.getElementById('statusSold').addEventListener('change', function() {

                if (this.checked) {

                    window.location.href = 'viewSoldPropertyUI.php';

                }

            });

            document.getElementById('statusNew').addEventListener('change', function() {

                if (this.checked) {

                    window.location.href = 'viewNewPropertyUI.php';

                }

            });

            priceSlider.noUiSlider.on('update', function(values, handle) {
                var lowerPriceLabel = document.getElementById('lowerPriceLabel');
                var upperPriceLabel = document.getElementById('upperPriceLabel');
                lowerPriceLabel.innerHTML = values[0];
                upperPriceLabel.innerHTML = values[1];
            });
        });

        function applyFilters() {
            var statusNew = document.querySelector('input[name="status"][value="new"]').checked;
            var statusSold = document.querySelector('input[name="status"][value="sold"]').checked;
            var prices = priceSlider.noUiSlider.get();
            console.log('Filtering properties:');
            console.log('Status New: ' + statusNew + ', Status Sold: ' + statusSold);
            console.log('Price Range: $' + prices[0] + ' to $' + prices[1]);

            // Redirect based on the selected radio button
            if (statusNew) {
                window.location.href = 'viewNewPropertyUI.php';
            } else if (statusSold) {
                window.location.href = 'viewSoldPropertyUI.php';
            }
        }
    </script>


</body>

</html>