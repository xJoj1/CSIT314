<?php
require_once '../../Entity/Rate_Review.php';

class viewRatingReviewController {
    private $rateReviewModel;

    public function __construct() {
        $this->rateReviewModel = new Rate_Review();
    }

    public function getAllRatingsAndReviews() {
        return $this->rateReviewModel->getAllReviews();
    }

    public function getRatingCounts() {
        return $this->rateReviewModel->getRatingCounts();
    }
}
?>