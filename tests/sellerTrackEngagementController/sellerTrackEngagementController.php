<?php
require_once 'PropertyListing.php';

class SellerTrackEngagementController {
    private $propertyListing;

    public function __construct() {
        $this->propertyListing = new PropertyListing();
    }

    // Fetches engagement metrics for all active property listings
    public function getEngagementMetrics() {
        return $this->propertyListing->getEngagementMetrics();
    }
}