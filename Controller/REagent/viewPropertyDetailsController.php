<?php
require_once '../../Entity/PropertyListing.php';

class PropertyDetailsController {

    private $propertyListing;

    public function __construct() {

        $this->propertyListing = new PropertyListing();

    }

    public function handlePropertyRequest() {
        if (!isset($_GET['id'])) {
            header('Location: viewAllProperty.php'); // Redirect if no property ID is given
            exit;
        }

        $propertyId = $_GET['id'];
        $property = $this->getAllPropertyListings($propertyId);
        if (!$property) {
            header('Location: viewPropertyListing.php'); // Redirect if property not found
            exit;
        }
        return $property;
    }

    public function getAllPropertyListings($propertyId) {

        return $this->propertyListing->getAllPropertyListings($propertyId);

    }

}