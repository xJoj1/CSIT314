<?php
require_once '../../Entity/PropertyListing.php';

class ViewPropertyListingController {

    private $propertyListing;

    public function __construct() {

        $this->propertyListing = new PropertyListing();

    }

    public function getAllListings() {

        return $this->propertyListing->getActiveListings();

    }

}