<?php
require_once '../../Entity/PropertyListing.php';

class SellerRateAndReviewUIController {
    private $propertyListing;

    public function __construct() {
        $this->propertyListing = new PropertyListing();
    }

    // Retrieve only active property listings from the database
    public function getSoldListings() {
        return $this->propertyListing->getSoldListings();
    }
}
?>