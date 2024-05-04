<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agent Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="/CSIT314/styles.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  
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
        <a class="nav-link" href="houseListing.php">House Listing</a>
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
    <div class="search-container">
        <div class="searchbox">
            <p><b>Search Property Listing</b></p>
            <input type="text" id="searchBox" name="searchBox" placeholder="Search.." size="40">
        </div>
        <div class="user-buttons">
            <a href="createListing.php" class="button">Create Listing</a>
            <a href="removeListing.php" class="button">Remove Listing</a>
            <a href="" class="button">Update Listing</a>
        </div>
    </div>
</div>


<!-- Property Listings -->
<div class="container mt-5">
    <div class="listing-container">
        <div class="scrollList">
            <div class="row">
                <!-- Sample Property Card -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-img-top-container">
                            <input type="checkbox" class="remove-checkbox">
                            <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">663C Jurong West Street 65</h5>
                            <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                            <a href="#" class="btn btn-primary view-details-btn">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-img-top-container">
                            <input type="checkbox" class="remove-checkbox">
                            <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">663C Jurong West Street 65</h5>
                            <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                            <a href="#" class="btn btn-primary view-details-btn">View Details</a>
                        </div>
                    </div>
                </div> <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-img-top-container">
                            <input type="checkbox" class="remove-checkbox">
                            <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">663C Jurong West Street 65</h5>
                            <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                            <a href="#" class="btn btn-primary view-details-btn">View Details</a>
                        </div>
                    </div>
                </div> <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-img-top-container">
                            <input type="checkbox" class="remove-checkbox">
                            <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">663C Jurong West Street 65</h5>
                            <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                            <a href="#" class="btn btn-primary view-details-btn">View Details</a>
                        </div>
                    </div>
                </div> <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-img-top-container">
                            <input type="checkbox" class="remove-checkbox">
                            <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">663C Jurong West Street 65</h5>
                            <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                            <a href="#" class="btn btn-primary view-details-btn">View Details</a>
                        </div>
                    </div>
                </div> <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-img-top-container">
                            <input type="checkbox" class="remove-checkbox">
                            <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">663C Jurong West Street 65</h5>
                            <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                            <a href="#" class="btn btn-primary view-details-btn">View Details</a>
                        </div>
                    </div>
                </div> <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-img-top-container">
                            <input type="checkbox" class="remove-checkbox">
                            <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">663C Jurong West Street 65</h5>
                            <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                            <a href="#" class="btn btn-primary view-details-btn">View Details</a>
                        </div>
                    </div>
                </div>
                <!-- Continue adding cards as needed -->
            </div>
        </div>
    </div>
</div>

<!-- Button to remove lisitng -->
<button id="unsuspendUser" type="unSuspendUser">Remove Listing</button>


<script>
    
    function toggleFavorite(element) {
        // Toggle between 'far' and 'fas' to change the icon style
        element.classList.toggle('far');
        element.classList.toggle('fas');
        element.classList.toggle('favorited'); // This class will handle the color change

        // Optional: Console log to check the state
        if (element.classList.contains('favorited')) {
            console.log('Added to favorites');
        } else {
            console.log('Removed from favorites');
        }
    }
    function updateActionButtons() {
    const checkboxes = document.querySelectorAll('.remove-checkbox');
    const isAnyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
    
    const removeButton = document.getElementById('remove-selected');
    if (isAnyChecked) {
        removeButton.disabled = false;
    } else {
        removeButton.disabled = true;
    }
}

// Add event listeners to checkboxes
document.querySelectorAll('.remove-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', updateActionButtons);
});



</script>

</body>
</html>
