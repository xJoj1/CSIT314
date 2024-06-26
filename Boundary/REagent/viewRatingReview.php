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
    <?php
    require_once '../../Controller/REagent/viewRatingReviewController.php';
    $controller = new viewRatingReviewController();
    $reviews = $controller->getAllRatingsAndReviews();
    $ratingCounts = $controller->getRatingCounts();
    ?>
  
    <!-- Navigation Bar (Logged In) -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="REdashboard.php">Real Estate</a>

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
        <a class="nav-link" href="viewPropertyListingUI.php">Property Listing</a>
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
        <h2>Ratings Overview</h2>
        <div class="ratings-summary">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Rating</th>
                        <th scope="col">Count</th>
                        <th scope="col">Progress</th>
                    </tr>
                </thead>
                <tbody id="ratingsBody">
                    <!-- Ratings will be generated dynamically -->
                    <?php
                    // Display the ratings dynamically
                    foreach ($ratingCounts as $rating => $count) {
                        $percentage = ($count / count($reviews)) * 100;
                        echo "<tr>
                                <td>{$rating} stars</td>
                                <td>{$count}</td>
                                <td>
                                    <div class=\"progress\">
                                        <div class=\"progress-bar\" style=\"width: {$percentage}%\">".round($percentage, 0)."%</div>
                                    </div>
                                </td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Random Reviews Section -->
        <h3>Some Reviews</h3>
        <div class="reviews">
            <?php
            foreach ($reviews as $review) {
                $stars = str_repeat('★', $review['Rating']) . str_repeat('☆', 5 - $review['Rating']);
                echo "<div class=\"card mb-3\">
                        <div class=\"card-body\">
                            <div class=\"review-stars\">{$stars}</div>
                            <h5 class=\"card-title\">".htmlspecialchars($review['Review'])."</h5>
                            <p class=\"card-text\"><small class=\"text-muted\">Last updated ".htmlspecialchars($review['ReviewDate'])."</small></p>
                        </div>
                    </div>";
            }
            ?>
        </div>
    </div>

</body>
</html>