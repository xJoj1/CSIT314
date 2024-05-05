<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Remove Property</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="/../styles.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
        require_once '../../DBC/Database.php';
        require_once '../../Entity/PropertyListing.php';
        require_once '../../Controller/RemovePropertyListingController.php';
        
        $database = new Database();
        $propertyListing = new PropertyListing($database);
        $controller = new removePropertyListingController($propertyListing);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_ids'])) {
            $idsToRemove = $_POST['remove_ids'];
            $removalSuccess = true;
            foreach ($idsToRemove as $id) {
                $success = $controller->removePropertyListing($id);
                if (!$success) {
                    $removalSuccess = false; // Set to false if any removal fails
                }
            }
            if ($removalSuccess) {
                echo "<div class='alert alert-success'>Selected listings have been removed.</div>";
            } else {
                echo "<div class='alert alert-danger'>Failed to remove listings.</div>";
            }
        }

        // Fetching all listings to display
        $listings = $propertyListing->getAllListings();
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
        <a class="nav-link" href="viewPropertyListing.php">House Listing</a>
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
            <a class="dropdown-item" href="../../logout.php">Logout</a> <!-- Link to logout.php-->
        </div>
        </li>
    </ul>
    </nav>

    <!-- Account List -->
    <div class="container AccContain  mt-5">
    <!-- Alert bar -->
    <div class="suspendalert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Property Listing Removed.
    </div>

    <!-- Search Bar -->
    <div class="container mt-5">
        <form method="POST" action=""> 
            <div class="search-container">
                <div class="searchbox">
                    <p><b>Search Property Listing</b></p>
                    <input type="text" id="searchBox" name="searchBox" placeholder="Search.." size="40">
                </div>
                <div class="user-buttons">
                    <a href="createListing.php" class="button">Create Listing</a>
                    <button type="submit" class="button">Remove Listing</button>
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
                                        <input type="checkbox" name="remove_ids[]" value="<?= $listing['id']; ?>" class="remove-checkbox">
                                        <img class="card-img-top" src="<?= $listing['image_url'] ?: 'placeholder-image.jpg'; ?>" alt="Property Image">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $listing['address']; ?></h5>
                                        <p class="card-text"><?= $listing['price']; ?> - <?= $listing['size']; ?> sqft <?= $listing['beds']; ?> bed <?= $listing['baths']; ?> bathroom</p>
                                        <a href="#" class="btn btn-primary view-details-btn">View Details</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div> 
                </div>
            </div>  
        </form>
    </div>

    <script>
        document.querySelectorAll('.remove-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const anyChecked = Array.from(document.querySelectorAll('.remove-checkbox')).some(c => c.checked);
                document.getElementById('remove-selected').disabled = !anyChecked;
            });
        });
    </script>

</body>
</html>
