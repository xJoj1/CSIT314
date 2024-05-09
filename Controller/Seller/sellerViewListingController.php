<?php
require_once '../../Entity/PropertyListing.php';  

class SellerViewListingController {
    private $propertyListing;

    public function __construct() {
        $this->propertyListing = new PropertyListing();  
    }

    public function getAllListedProperties() {
      
        return $this->propertyListing->getAllListings();
    }
}
?>