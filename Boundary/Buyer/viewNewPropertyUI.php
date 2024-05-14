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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <?php
    require_once '../../Controller/Buyer/viewNewPropertyController.php';
    $controller = new viewNewPropertyController();
    $properties = $controller->getActiveProperties();

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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome Buyer</a>
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
                        <input type="radio" name="status" value="new" class="toggle-radio" id="statusNew" checked>
                        <label for="statusNew">New</label>
                    </div>
                    <div class="filter-group">
                        <input type="radio" name="status" value="sold" class="toggle-radio" id="statusSold">
                        <label for="statusSold">Sold</label>
                    </div>
                    <div class="range-group">
                        <div class="price-range">
                            <h5><b>Price Range</b></h5>
                            <span id="lowerPriceLabel">100,000</span> - <span id="upperPriceLabel">999,999</span>
                        </div>
                        <div id="priceSlider"></div>
                    </div>
                    <button id="applyFiltersBtn" class="btn filter-button" onclick="applyFilters()">Apply
                        Filters</button>
                    <button class="btn filter-button" onclick="clearFilters()">Clear Filters</button>
                </div>
            </div>

            <!-- Search and Listings -->
            <div class="col-md-8 flexible-width">
                <h1> View New Properties </h1>
                <!-- Search Bar and Button Container -->
                <div class="search-border">
                    <!-- Button on the right -->
                    <div class="user-buttons3">
                        <a href="searchNewPropertyUI.php" class="buyerbutton">Search Property</a>
                        <a href="savedNewPropertyUI.php" class="buyerbutton">Saved Property</a>
                    </div>
                </div>

                <!-- Property Listings -->
                <div class="listing-container">
                    <div class="scrollList">
                        <div class="row">
                            <?php if (empty($properties)): ?>
                                <p>No new listings found.</p>
                            <?php else: ?>
                                <?php foreach ($properties as $property): ?>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img class="card-img-top" src="<?php echo $property['image_url']; ?>"
                                                alt="Property Image">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $property['address']; ?></h5>
                                                <p class="card-text">
                                                    <?php echo '$' . number_format($property['price']) . ' - ' . $property['size'] . ' sqft '; ?>
                                                    <br>
                                                    <?php echo $property['beds'] . ' bed ' . $property['baths'] . ' bathroom'; ?>
                                                </p>
                                                <a href="viewNewPropertyDetails.php?id=<?php echo $property['id']; ?> &increment_views=1" class="btn btn-primary">View Details</a>
                                            </div>

                                            <div class="card-footer">
                                                <!-- Form for toggling the bookmark -->
                                                <form method="POST" action="viewNewPropertyUI.php"> <!-- Ensure action points to the correct handling script -->
                                                    <input type="hidden" name="propertyId" value="<?php echo htmlspecialchars($property['id']); ?>">
                                                    <input type="hidden" name="bookmark" value="<?php echo isset($property['bookmark']) && $property['bookmark'] == '1' ? '0' : '1'; ?>">
                                                    <input type="hidden" name="incrementShortlist" value="1"> <!-- Signal to increment the count -->
                                                    <button type="submit" class="btn btn-link p-0">
                                                        <i class="fa-heart <?php echo isset($property['bookmark']) && $property['bookmark'] == '1' ? 'fas' : 'far'; ?> favorite-icon"></i>
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
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

        document.addEventListener('DOMContentLoaded', function () {

            var priceSlider = document.getElementById('priceSlider');

            noUiSlider.create(priceSlider, {
                start: [100000, 999999],
                connect: true,
                range: {
                    'min': 100000,
                    'max': 999999
                },
                step: 1000,
                tooltips: [true, true],
                format: {
                    to: function (value) {
                        return parseInt(value).toLocaleString();
                    },
                    from: function (value) {
                        return Number(value.replace(',', ''));
                    }
                }
            });

            document.getElementById('statusSold').addEventListener('change', function () {
                if (this.checked) {
                    window.location.href = 'viewSoldPropertyUI.php';
                }
            });

            document.getElementById('statusNew').addEventListener('change', function () {
                if (this.checked) {
                    window.location.href = 'viewNewPropertyUI.php';
                }
            });

            priceSlider.noUiSlider.on('update', function (values, handle) {
                var lowerPriceLabel = document.getElementById('lowerPriceLabel');
                var upperPriceLabel = document.getElementById('upperPriceLabel');
                lowerPriceLabel.innerHTML = values[0];
                upperPriceLabel.innerHTML = values[1];
            });
        });

        function applyFilters() {
            var priceSlider = document.getElementById('priceSlider').noUiSlider;
            var prices = priceSlider.get();
            var statusNew = document.querySelector('input[name="status"][value="new"]').checked;
            var noListingsFound = true; 

            $.ajax({
                url: '../../Controller/buyer/viewNewPropertyController.php',
                type: 'POST',
                data: {
                    minPrice: parseFloat(prices[0].replace(',', '')),
                    maxPrice: parseFloat(prices[1].replace(',', '')),
                    status: statusNew ? 'active' : 'sold'
                },
                success: function (response) {
                    if (response.trim() === "") {
                        noListingsFound = true;
                    } else {
                        noListingsFound = false;
                        $('.listing-container .scrollList .row').html(response);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX error:', status, error);
                    alert('Error retrieving filtered properties. Please check the console for more details.');
                },
                complete: function () {
                    if (noListingsFound && $('#applyFiltersBtn').data('clicked')) {
                        $('.listing-container .scrollList .row').html("<h5>No listings found.</h5>");
                    }
                }
            });
            $('#applyFiltersBtn').data('clicked', true);
        }

        function clearFilters() {
            document.getElementById('statusNew').checked = true;
            var priceSlider = document.getElementById('priceSlider').noUiSlider;
            priceSlider.set([100000, 999999]);
            applyFilters();
        }

    </script>

</body>

</html>