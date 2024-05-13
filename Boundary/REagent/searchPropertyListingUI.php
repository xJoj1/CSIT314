<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Property Listing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../styles.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
        require_once '../../Controller/REagent/searchPropertyListingController.php';
        $controller = new searchPropertyListingController();
        $listings = $controller->searchListings();
    ?>

    <!-- Navigation Bar (Logged In) -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="REdashboard.php">Real Estate</a>

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
        <a class="nav-link" href="viewPropertyListingUI.php">Property Listing</a>
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

    <!-- fetches property data -->
    <?php
        require_once '../../Controller/REagent/viewPropertyListingController.php';
        $controller = new ViewPropertyListingController();
        $listings = $controller->getAllListings();
    ?>

<!-- Account List -->
<div class="container AccContain  mt-5">
    <!-- Search Bar -->
    <div class="search-container">
        <div class="searchbox">
            <p><b>Search Property Listing</b></p>
            <input type="text" id="searchBox" name="searchBox" placeholder="Search.." onkeyup="filterProperties()" size="40">
        </div>
        <div class="user-buttons">
            <a href="createPropertyListingUI.php" class="button">Create Listing</a>
            <a href="removePropertyListingUI.php" class="button">Remove Listing</a>
            <a href="updatePropertyListingUI.php" class="button">Update Listing</a>
        </div>
    </div>

    <!-- Property Listings -->
        <div class="listing-container">
            <div class="scrollList">
                <div class="row" id="propertyListing">
                    <?php foreach ($listings as $listing): ?>
                        <!-- Sample Property Card -->
                        <div class="col-md-4 mb-4 property-card" data-address="<?= strtolower(htmlspecialchars($listing['address'])); ?>">
                            <div class="card">
                                <div class="card-img-top-container">
                                    <img class="card-img-top" src="<?= $listing['image_url'] ?: 'placeholder-image.jpg'; ?>" alt="Property Image">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($listing['address']); ?></h5>
                                    <p class="card-text"><?= $listing['price']; ?> - <?= $listing['size']; ?> sqft <?= $listing['beds']; ?> bed <?= $listing['baths']; ?> bathroom</p>
                                    <a href="../../Boundary/REagent/viewPropertyDetailsUI.php?id=<?php echo $listing['id']; ?>&increment_views=1"
                                        class="btn btn-primary">View Details</a>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div> 
            </div>
        </div>  
    </div>

    <script>
        function filterProperties() {
            var input = document.getElementById('searchBox').value.trim().toLowerCase();
            var listings = document.querySelectorAll('.property-card');
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

            // Show a message if no properties are found
            const listingsContainer = document.getElementById('propertyListing');
            if (!found && input) {
                listingsContainer.innerHTML = '<div class="col-12"><p>No properties found.</p></div>';
            } else if (!input) {
                // This resets the view when the search box is cleared
                window.location.reload(); // Refresh the page to reset the view
            }
        }
    </script>
    
</body>
</html>
