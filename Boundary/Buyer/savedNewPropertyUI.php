<?php
    require_once '../../Controller/Buyer/savedNewPropertyController.php';
    $controller = new savedNewPropertyController();

    $properties = $controller->getActiveAnd1Properties();

    if (!is_array($properties)) {
        $properties = [];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['propertyId'], $_POST['bookmark'])) {
        $propertyId = $_POST['propertyId'];
        $bookmark = $_POST['bookmark'];  // This should be either '0' or '1' based on the form input
    
        // Call a method in the controller to update the bookmark status
        $success = $controller->updateBookmarkStatus($propertyId, $bookmark);
    
        // Redirect back to avoid form resubmission issues
        header('Location: savedNewPropertyUI.php');
        exit;
    }
?>



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
                        <input type="radio" name="status" value="new" class="toggle-radio" checked>
                        <label>New</label>
                    </div>
                    <div class="filter-group">
                        <input type="radio" name="status" value="sold" class="toggle-radio">
                        <label>Sold</label>
                    </div>  
                    <button class="btn filter-button" onclick="applyFilters()">Apply Filters</button>
                </div>
            </div>

 <!-- Search and Listings -->
<div class="col-md-8 flexible-width">
    <div class="save-property">
        <h4><b>Saved New Property</b></h4>
    </div>
    <div class="listing-container">
    <div class="scrollList">
        <div class="row">
            <?php foreach ($properties as $property): ?>  
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="<?php echo $property['image_url']; ?>" alt="Property Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $property['address']; ?></h5>
                            <p class="card-text"> <?php echo '$' . number_format($property['price']) . ' - ' . htmlspecialchars($property['size']) . ' sqft ' . htmlspecialchars($property['beds']) . ' bed ' . htmlspecialchars($property['baths']) . ' bathroom'; ?> </p>
                            <a href="viewNewPropertyDetails.php?id=<?php echo htmlspecialchars($property['id']); ?>&increment_views=1" class="btn btn-primary">View Details</a>
                        </div>

                        <div class="card-footer">
                            <!-- Form for toggling the bookmark -->
                            <form method="POST" action="savedNewPropertyUI.php">
                                <input type="hidden" name="propertyId" value="<?php echo htmlspecialchars($property['id']); ?>">
                                <input type="hidden" name="bookmark" value="<?php echo isset($property['bookmark']) ? ($property['bookmark'] == '1' ? '0' : '1') : '0'; ?>">
                                <button type="submit" class="btn btn-link p-0">
                                    <i class="fa-heart <?php echo isset($property['bookmark']) && $property['bookmark'] == '1' ? 'fas' : 'far'; ?> favorite-icon"></i>    
                            </button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>



     <!-- Back Button -->
    <div class="user-buttons" style="justify-content: center; width: 100%; height:auto">
        <a id="back" href="viewNewPropertyUI.php" class="btn btn-secondary" role="button">Back</a>
    </div>
</div>


    <script>
    function toggleFavorite(element) {
        element.classList.toggle('far');
        element.classList.toggle('fas');
     
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
        console.log('Filtering properties:');
        console.log('Status New: ' + statusNew + ', Status Sold: ' + statusSold);
        // Implement your filtering logic here

        // Redirect based on the selected radio button
        if (statusNew) {
            window.location.href = 'savedNewPropertyUI.php';
        } else if (statusSold) {
            window.location.href = 'savedSoldPropertyUI.php';
        }
    }

    function clearAllFilters() {
        document.querySelector('input[name="status"][value="new"]').checked = false;
        document.querySelector('input[name="status"][value="sold"]').checked = false;
        priceSlider.noUiSlider.reset();
        console.log('Filters cleared');
        // Logic to refresh the listings to show all items
    }
</script>


</body>
</html>
