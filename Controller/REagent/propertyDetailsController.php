<?php
require_once '../../Entity/PropertyListing.php';

class PropertyDetailsController {

    private $propertyListing;

    public function __construct() {

        $this->propertyListing = new PropertyListing();

    }

    public function getAllListings() {

        return $this->propertyListing->getAllListings();

    }

    public function getAllPropertyListings($propertyId) {

        return $this->propertyListing->getAllPropertyListings($propertyId);

    }

}