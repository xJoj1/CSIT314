<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ratings and Review</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
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
            <a class="dropdown-item" href="../../logout.php">Logout</a> <!-- Link to logout.php -->
        </div>
        </li>
    </ul>
    </nav>

    <!-- Main Body -->
    <div class="container mt-5">
        <div class="listing-container">
            <div class="scrollList">
                <div class="row">
                </div>
            </div>
        </div>
    </div>

</body>
</html>
