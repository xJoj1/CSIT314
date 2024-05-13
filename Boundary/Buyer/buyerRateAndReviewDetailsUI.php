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
    <?php
    require_once '../../Controller/Buyer/RatingController.php';
    require_once '../../Controller/Buyer/ReviewController.php';

    $ratingController = new RatingController();
    $reviewController = new ReviewController();

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userType = $_POST['userType'] ?? 'buyer';  // Assuming default 'buyer'
        $userID = intval($_POST['userID'] ?? 0);   // Convert to integer
        $agentID = intval($_POST['agentID'] ?? 0); // Convert to integer
        $rating = intval($_POST['rating'] ?? 0);   // Convert to integer
        $review = trim($_POST['review'] ?? '');    // Trim spaces

        if ($rating > 0 && !empty($review)) {
            try {
                // Attempt to add the review and handle the outcome
                if ($reviewController->addReview($userType, $userID, $agentID, $rating, $review)) {
                    echo "<script>alert('Review and rating submitted successfully!');</script>";
                } else {
                    echo "<script>alert('Failed to submit review and rating.');</script>";
                }
            } catch (Exception $e) {
                echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
            }
        } else {
            echo "<script>alert('Invalid input. Please ensure all fields are correctly filled.');</script>";
        }
    }
    ?>
  
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
    </li>
  </ul>
</nav>


 <!-- Search and Listings -->
 <div class="container AccContain  mt-5">
 <h1><b>Rate & Review</b></h1>

  <!-- Property Listings -->
  <div class="listing-container">
    <div class="scrollRateAndReview">
        <form id="reviewForm" method="post" action="">
            <input type="hidden" id="userType" name="userType" value="buyer">
            <input type="hidden" id="userID" name="userID" value="3"> 
            <input type="hidden" id="agentID" name="agentID" value="2"> 
            <div class="star-rating">
                <span class="star" data-rating="1">&#9733;</span>
                <span class="star" data-rating="2">&#9733;</span>
                <span class="star" data-rating="3">&#9733;</span>
                <span class="star" data-rating="4">&#9733;</span>
                <span class="star" data-rating="5">&#9733;</span>
            </div>
            <input type="hidden" id="rating" name="rating" value="0">
            <textarea class="review-text" name="review" placeholder="Write a review..." wrap="soft" required></textarea>
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
    updateStars(index + 1);
  });
});

function updateStars(rating) {
  const stars = document.querySelectorAll('.star-rating .star');
  document.getElementById('rating').value = rating; // Update the hidden input
  stars.forEach((star, idx) => {
    star.style.color = idx < rating ? 'gold' : 'gray'; // Change color up to the selected star
  });
}

document.getElementById('reviewForm').addEventListener('submit', function(event) {
    const ratingValue = document.getElementById('rating').value;
    if (!ratingValue || ratingValue === "0") { // Check if rating is not selected
        event.preventDefault(); // Prevent form submission
        document.getElementById('errorMessage').style.display = 'block';
    } else {
        document.getElementById('errorMessage').style.display = 'none';
    }
});

document.getElementById('reviewForm').addEventListener('submit', function(event) {
    var reviewContent = document.querySelector('.review-text').value;
    console.log('Review content:', reviewContent); // Check what is being sent
    if (!reviewContent.trim()) {
        event.preventDefault(); // Prevent form submission if review is empty
        alert('Please fill in the review.');
    }
});

</script>
