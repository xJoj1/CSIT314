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
        require_once '../../Controller/Buyer/searchSoldPropertyController.php';
        $controller = new searchSoldPropertyController();
        $listings = $controller->searchListings();
    ?>
  
   <!-- Navigation Bar (Logged In) -->
   <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="buyerDashboard.php">Real Estate</a>
        <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto nav-links-spacing">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userAccMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Property Listing
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
                        <a class="dropdown-item" href="viewNewPropertyUI.php">New Property</a>
                        <a class="dropdown-item" href="viewSoldPropertyUI.php">Sold Property</a>
                    </div>
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

    <?php
        require_once '../../Controller/Buyer/viewSoldPropertyController.php';
        $controller = new viewSoldPropertyController();
        $soldProperties = $controller->getSoldProperties();
    ?>

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
                        <input type="radio" name="status" value="new" class="toggle-radio">
                        <label>New</label>
                    </div>
                    <div class="filter-group">
                        <input type="radio" name="status" value="sold" class="toggle-radio" checked >
                        <label>Sold</label>
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
            <div class="search-container-with-filter">
                <label for="searchBox"><b>Search Property Listing</b></label>
                <input type="text" id="searchBox" name="searchBox" placeholder="Search.." onkeyup="filterProperties()" class="form-control">
            </div>
            <!-- Button on the right -->
            <div class="user-buttons">
                <a href="savedSoldPropertyUI.php" class="button">Saved Property</a>
            </div>
        </div>
        <!-- Property Listings -->
        <div class="listing-container">
            <div class="scrollList">
                <div class="row">
                    <?php foreach ($soldProperties as $listing): ?>
                        <div class="col-md-4 mb-4 property-card" data-address="<?= strtolower(htmlspecialchars($listing['address'])); ?>">
                            <div class="card">
                                <img class="card-img-top" src="<?php echo $listing['image_url']; ?>" alt="Property Image">
                                <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($listing['address']); ?></h5>
                                <p class="card-text"><?= $listing['price']; ?> - <?= $listing['size']; ?> sqft <?= $listing['beds']; ?> bed <?= $listing['baths']; ?> bathroom</p>
                                <a href="viewSoldPropertyDetails.php?id=<?php echo $listing['id']; ?>" class="btn btn-primary">View Details</a>
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

    function filterProperties() {
        var input = document.getElementById('searchBox').value.trim().toLowerCase();
        var listings = document.querySelectorAll('.property-card');

        if (!input) {
            window.location.reload(); // Refresh the page to reset the view when input is cleared
            return;
        }

        var found = false;
        listings.forEach(listing => {
            const address = listing.getAttribute('data-address').toLowerCase();
            if (address.includes(input)) {
                listing.style.display = '';
                found = true;
            } else {
                listing.style.display = 'none';
            }
        });

        // Display a message if no properties are found
        const listingsContainer = document.getElementById('propertyListing');
        if (!found) {
            listingsContainer.innerHTML = '<div class="col-12"><p>No properties found.</p></div>';
        }
    }

</script>


</body>
</html>
