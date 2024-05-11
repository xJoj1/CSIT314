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

<!-- Navigation Bar (Logged In) -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="buyerDashboard.php">Real Estate</a>

  <!-- Links -->
  <ul class="navbar-nav mr-auto">
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
        <a class="nav-link active-nav" href="buyerRateAndReviewUI.php">Rating/Review</a>
    </li>
  </ul>
  <!-- Right-aligned dropdown for admin options -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Welcome Buyer
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
 <h1><b>Rate & Review</b></h1>

  <!-- Property Listings -->
  <div class="listing-container">
      <div class="scrollList">
          <div class="row">

              <div class="col-md-4 mb-4">
                  <div class="card">
                      <img class="card-img-top" src="" alt="Property Image">
                      <div class="card-body">
                          <h5 class="card-title"></h5>
                          <p class="card-text"></p>
                          <a href="buyerRateAndReviewDetailsUI.php? id=" class="btn btn-primary">Rate & Review</a>
                          <div class="card-footer">
                            <i class="far fa-heart favorite-icon" onclick="toggleFavorite(this)"></i>
                        </div>
                      </div>
                  </div>
              </div>

              <div class="col-md-4 mb-4">
                  <div class="card">
                      <img class="card-img-top" src="" alt="Property Image">
                      <div class="card-body">
                          <h5 class="card-title"></h5>
                          <p class="card-text"></p>
                          <a href="buyerRateAndReviewDetailsUI.php? id=" class="btn btn-primary">Rate & Review</a>
                          <div class="card-footer">
                            <i class="far fa-heart favorite-icon" onclick="toggleFavorite(this)"></i>
                        </div>
                      </div>
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
</script>




</body>
</html>
