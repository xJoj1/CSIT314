<?php
require_once '../../Entity/PropertyListing.php';

class searchSoldPropertyController {
    private $propertyListing;

    public function __construct() {
        $this->propertyListing = new PropertyListing();
    }

    // Method to handle deciding whether to search sold properties or list all sold properties
    public function searchListings() {
        if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
            $searchTerm = trim($_GET['search']);
            return $this->searchSoldPropertiesByAddress($searchTerm);
        } else {
            return $this->getSoldListings();
        }
    }

    // Fetch all sold property listings from the database
    public function getSoldListings() {
        return $this->propertyListing->getSoldListings();
    }

    // Search sold property listings by address
    public function searchSoldPropertiesByAddress($searchTerm) {
        return $this->propertyListing->searchSoldPropertiesByAddress($searchTerm);
    }
}