<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rate & Review Details</title>
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
    <div class="scrollRateAndReview">
        <form id="reviewForm">
            <div class="star-rating">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
            </div>
            <textarea class="review-text" placeholder="Write a review..." wrap="soft" required></textarea>
            <div id="errorMessage" style="color: red; display: none;">Please select a rating.</div>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
  </div>
  <div class="back-center">
    <button type="button" class="back-btn" onclick="window.location.href='buyerRateAndReviewUI.php'">Back</button>
  </div>
</div>
</body>
</html>

<script>
document.querySelectorAll('.star-rating .star').forEach((star, index) => {
  star.addEventListener('click', () => {
    updateStars(index);
  });
});

function updateStars(index) {
  const stars = document.querySelectorAll('.star-rating .star');
  stars.forEach((star, i) => {
    if (i <= index) {
      star.classList.add('rated');
    } else {
      star.classList.remove('rated');
    }
  });
}

document.querySelector('.submit-btn').addEventListener('click', function() {
  const rating = document.querySelectorAll('.star-rating .star.rated').length;
  const review = document.querySelector('.review-text').value;
  console.log('Rating:', rating, 'Review:', review);
});

document.getElementById('reviewForm').addEventListener('submit', function(event) {
    const ratedCount = document.querySelectorAll('.star-rating .star.rated').length;
    const errorMessage = document.getElementById('errorMessage');
    if (ratedCount === 0) {
        errorMessage.style.display = 'block';
        event.preventDefault(); // Prevent form submission
    } else {
        errorMessage.style.display = 'none';
    }
});


</script>
