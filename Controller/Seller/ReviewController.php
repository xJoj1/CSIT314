<?php

require_once '../../Entity/Rate_Review.php'; // Include the Rate_Review entity class

class ReviewController {
    private $rateReviewEntity;

    public function __construct() {
        $this->rateReviewEntity = new Rate_Review(); // Instantiate the Rate_Review entity
    }

    // Method to add a review with an associated rating
    public function addReview($userType, $userID, $agentID, $rating, $review) {
        // Check the validity of the inputs, particularly the review text
        if (!empty(trim($review)) && $rating >= 0 && $rating <= 5) {
            // Pass the data to the Rate_Review entity for insertion into the database
            return $this->rateReviewEntity->addRateReview($userType, $userID, $agentID, $rating, $review);
        } else {
            throw new Exception("Invalid input. Please ensure all fields are correctly filled.");
        }
    }
}
?>