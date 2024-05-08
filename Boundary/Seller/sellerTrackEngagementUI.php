<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Track Engagement</title>
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
  <!-- Brand -->
  <a class="navbar-brand" href="sellerDashboard.php">Real Estate</a>

  <!-- Links -->
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="sellerDashboard.php">Home</a>
    </li>
    <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userAccMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Property Listing
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
                <a class="dropdown-item" href="sellerViewListingUI.php">Listed Property</a>
                <a class="dropdown-item" href="sellerSoldPropertyUI.php">Sold Property</a>
                <a class="dropdown-item" href="sellerTrackEngagementUI.php">Engagement Metrics</a>
            </div>
        </li>
    <li class="nav-item">
      <a class="nav-link" href="sellerRateAndReviewUI.php">Rate/Review</a>
    </li>
  </ul>
  <!-- Right-aligned dropdown for admin options -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Welcome Seller
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
        <a class="dropdown-item" href="#">Profile</a>
        <a class="dropdown-item" href="../../logout.php">Logout</a> <!-- Link to logout.php -->
      </div>
    </li>
  </ul>
</nav>

 <!-- Search and Listings -->
 <div class="container AccContain  mt-5">
 <h1><b>Property Engagement Metrics</b></h1>

  <!-- Property Listings -->
  <div class="listing-container">
    <div class="engagementList">
      <div class="checkbox">
        <input class="chkbx" type="checkbox" id="property1" name="checkbox1">
        <p>Property 1</p>
        <span class="shortlist">Shortlisted: 7 times</span>
        <span class="views">Views: 7</span>
      </div>
      <div class="checkbox">
        <input class="chkbx" type="checkbox" id="property2" name="checkbox1">
        <p>Property 2</p>
        <span class="shortlist">Shortlisted: 5 times</span>
        <span class="views">Views: 5</span>
      </div>
      <div class="checkbox">
        <input class="chkbx" type="checkbox" id="property3" name="checkbox1">
        <p>Property 3</p>
        <span class="shortlist">Shortlisted: 3 times</span>
        <span class="views">Views: 20</span>
      </div>
    </div>
  </div>

</div>




</body>
</html>
