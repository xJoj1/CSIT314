<?php

require_once '../../Entity/Rate_Review.php'; // Include the Rate_Review entity class

class RatingController {
    private $rateReviewEntity;

    public function __construct() {
        $this->rateReviewEntity = new Rate_Review(); // Instantiate the Rate_Review entity
    }

    // Method to only add a rating, assuming no review text is provided
    public function addRating($rating) {
        if ($rating >= 0 && $rating <= 5) {
            // If only rating is given without a review, handle accordingly
            return $this->rateReviewEntity->addRateReview($rating, "");
        } else {
            throw new Exception("Invalid rating: Rating must be between 0 and 5.");
        }
    }
}
?>