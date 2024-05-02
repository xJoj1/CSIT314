<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agent Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles.css"> 
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
            <a class="dropdown-item" href="../logout.php">Logout</a> <!-- Link to logout.html -->
        </div>
        </li>
    </ul>
    </nav>

    <!-- Search Bar -->
    <div class="container mt-5">
        <div class="search-container">
            <div class="searchbox">
                <p><b>Search Property Listing</b></p>
                <input type="text" id="searchBox" name="searchBox" placeholder="Search.." size="40">
            </div>
        
        </div>
    </div>


    <!-- Property Listings -->
    <div class="suspend-container">
    <div class="selectAll"> <!-- top border -->      
    <div class="suspendList">
    <div class="container mt-5">
        <div class="row">
            <!-- Sample Property Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                    <div class="card-body">
                        <h5 class="card-title">663C Jurong West Street 65</h5>
                        <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <!-- Repeat the above block for each property, ensure each is within a col-md-4 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                    <div class="card-body">
                        <h5 class="card-title">663C Jurong West Street 65</h5>
                        <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                    <div class="card-body">
                        <h5 class="card-title">663C Jurong West Street 65</h5>
                        <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                    <div class="card-body">
                        <h5 class="card-title">663C Jurong West Street 65</h5>
                        <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                    <div class="card-body">
                        <h5 class="card-title">663C Jurong West Street 65</h5>
                        <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img class="card-img-top" src="placeholder-image.jpg" alt="Property Image">
                    <div class="card-body">
                        <h5 class="card-title">663C Jurong West Street 65</h5>
                        <p class="card-text">$550,000 - 1578 sqft 3 bed 2 bathroom</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <!-- Continue adding cards as needed -->
        </div>
    </div></div></div></div>


</body>
</html>