<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rate & Review</title>
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
        require_once '../../Controller/Seller/sellerRateAndReviewUIController.php';
        $controller = new SellerRateAndReviewUIController();
        $agents = $controller->getAgents();
    ?>
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
        <a class="dropdown-item" href="../../logout.php">Logout</a> <!-- Link to logout.php -->
      </div>
    </li>
  </ul>
</nav>

 <!-- Search and Listings -->
 <div class="container AccContain  mt-5">
 <h1><b>Rate & Review Agents</b></h1>

  <!-- Property Listings -->
  <div class="listing-container">
      <div class="scrollList">
          <div class="row">
            <?php foreach ($agents as $agent): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="https://cdn.vectorstock.com/i/preview-1x/27/21/businessman-real-estate-agent-vector-38892721.jpg" alt="Agent Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $agent['Agent_name']; ?></h5>
                            <p class="card-text"><?php echo $agent['Company']; ?></p>
                            <p class="card-text">Experience: <?php echo $agent['Experience']; ?> Years</p>
                            <a href="sellerRateAndReviewDetailsUI.php" class="btn btn-rate">Rate & Review</a>
                        </div>
                    </div>
                </div>  
             <?php endforeach; ?>
            </div>
          </div>
      </div>
  </div>
</div>




</body>
</html>
