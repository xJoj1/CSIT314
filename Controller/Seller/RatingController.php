<?php

require_once '../../Entity/Rate_Review.php'; // Include the Rate_Review entity class

class RatingController {
    private $rateReviewEntity;

    public function __construct() {
        $this->rateReviewEntity = new Rate_Review(); // Instantiate the Rate_Review entity
    }

    // Method to only add a rating, assuming no review text is provided
    public function addRating($userType, $userID, $agentID, $rating, $review = '') {
        // Validate the rating input
        if ($rating >= 0 && $rating <= 5) {
            // Call the addRateReview method on the entity
            return $this->rateReviewEntity->addRateReview($userType, $userID, $agentID, $rating, $review);
        } else {
            throw new Exception("Invalid rating: Rating must be between 0 and 5.");
        }
    }
}
?>