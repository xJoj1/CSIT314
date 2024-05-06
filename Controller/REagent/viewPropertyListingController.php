<?php
// ViewPropertyListingController.php
require_once '../../Entity/PropertyListing.php';

class ViewPropertyListingController {
    private $propertyListing;

    public function __construct(PropertyListing $propertyListing) {
        $this->propertyListing = $propertyListing;
    }

    public function getAllListings() {
        return $this->propertyListing->getAllListings();
    }
}