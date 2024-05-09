<?php
require_once '../../Entity/PropertyListing.php';  // Assuming your PropertyListing entity is stored here

class SellerViewListingController {
    private $propertyListing;

    public function __construct() {
        $this->propertyListing = new PropertyListing();  // This should be your PropertyListing model class
    }

    public function getAllListedProperties() {
        // This fetches all properties, you may need to add a seller-specific method
        return $this->propertyListing->getAllListings();
    }
}
?>