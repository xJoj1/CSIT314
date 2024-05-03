<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buyer Dashboard</title>
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
        <a class="navbar-brand" href="buyerDashboard.php">Real Estate</a>

        <!-- Toggler/Collapsible Button -->
        <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto nav-links-spacing">
                <li class="nav-item">
                    <a class="nav-link active-nav" href="buyerDashboard.php">Property</a> <!-- 'active-nav' class added here -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mortgageCalculator.php">Mortgage Calculator</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rateNreview.php">Rating/Review</a>
                </li>
            </ul>


            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Welcome Buyer
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

<!-- Search Bar -->
<div class="container mt-5">
    <div class="search-container">
        <div class="searchbox">
            <p><b>Search Property Listing</b></p>
            <input type="text" id="searchBox" name="searchBox" placeholder="Search..">
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
                        <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                        <div class="card-body">
                            <h5 class="card-title">663C Jurong West Street 65</h5>
                            <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                            <a href="#" class="btn btn-primary view-details-btn">View Details</a>
                        </div>
                        <div class="card-footer">
                            <i class="far fa-heart favorite-icon" onclick="toggleFavorite(this)"></i> <!-- Heart icon -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                        <div class="card-body">
                            <h5 class="card-title">663C Jurong West Street 65</h5>
                            <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                            <a href="#" class="btn btn-primary view-details-btn">View Details</a>
                        </div>
                        <div class="card-footer">
                            <i class="far fa-heart favorite-icon" onclick="toggleFavorite(this)"></i> <!-- Heart icon -->
                        </div>
                    </div>
                </div><div class="col-md-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                        <div class="card-body">
                            <h5 class="card-title">663C Jurong West Street 65</h5>
                            <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                            <a href="#" class="btn btn-primary view-details-btn">View Details</a>
                        </div>
                        <div class="card-footer">
                            <i class="far fa-heart favorite-icon" onclick="toggleFavorite(this)"></i> <!-- Heart icon -->
                        </div>
                    </div>
                </div><div class="col-md-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                        <div class="card-body">
                            <h5 class="card-title">663C Jurong West Street 65</h5>
                            <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                            <a href="#" class="btn btn-primary view-details-btn">View Details</a>
                        </div>
                        <div class="card-footer">
                            <i class="far fa-heart favorite-icon" onclick="toggleFavorite(this)"></i> <!-- Heart icon -->
                        </div>
                    </div>
                </div><div class="col-md-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                        <div class="card-body">
                            <h5 class="card-title">663C Jurong West Street 65</h5>
                            <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                            <a href="#" class="btn btn-primary view-details-btn">View Details</a>
                        </div>
                        <div class="card-footer">
                            <i class="far fa-heart favorite-icon" onclick="toggleFavorite(this)"></i> <!-- Heart icon -->
                        </div>
                    </div>
                </div><div class="col-md-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                        <div class="card-body">
                            <h5 class="card-title">663C Jurong West Street 65</h5>
                            <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                            <a href="#" class="btn btn-primary view-details-btn">View Details</a>
                        </div>
                        <div class="card-footer">
                            <i class="far fa-heart favorite-icon" onclick="toggleFavorite(this)"></i> <!-- Heart icon -->
                        </div>
                    </div>
                </div><div class="col-md-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                        <div class="card-body">
                            <h5 class="card-title">663C Jurong West Street 65</h5>
                            <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                            <a href="#" class="btn btn-primary view-details-btn">View Details</a>
                        </div>
                        <div class="card-footer">
                            <i class="far fa-heart favorite-icon" onclick="toggleFavorite(this)"></i> <!-- Heart icon -->
                        </div>
                    </div>
                </div>
                <!-- Continue adding cards as needed -->
            </div>
        </div>
    </div>
</div>


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


</script>

</body>
</html>
