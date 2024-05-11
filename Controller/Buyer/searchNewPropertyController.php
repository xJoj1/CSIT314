<?php
require_once '../../Entity/PropertyListing.php';

class searchNewPropertyController {
    private $propertyListing;

    public function __construct() {
        $this->propertyListing = new PropertyListing();
    }

    // Method to handle deciding whether to search or list all properties
    public function searchListings() {
        if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
            $searchTerm = trim($_GET['search']);
            return $this->searchPropertyListings($searchTerm);
        } else {
            return $this->getActiveListings();
        }
    }

    // Retrieve all property listings from the database
    public function getActiveListings() {
        return $this->propertyListing->getActiveListings();
    }

    // Method to search property listings by address
    public function searchPropertyListings($searchTerm = '') {
        return $this->propertyListing->searchByAddress($searchTerm);
    }
}