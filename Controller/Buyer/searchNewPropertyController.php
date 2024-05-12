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
            return $this->getAllListings();
        }
    }

    // Retrieve all property listings from the database
    public function getAllListings() {
        return $this->propertyListing->getAllListings();
    }

    // Method to search property listings by address
    public function searchPropertyListings($searchTerm = '') {
        return $this->propertyListing->searchByAddress($searchTerm);
    }
}