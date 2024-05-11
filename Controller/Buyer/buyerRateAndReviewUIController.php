<?php
require_once '../../Entity/PropertyListing.php';

class BuyerRateAndReviewUIController {
    private $propertyListing;

    public function __construct() {
        $this->propertyListing = new PropertyListing();
    }

    // Retrieve only active property listings from the database
    public function getActiveListings() {
        return $this->propertyListing->getActiveListings();
    }
}
?>
