<?php
require_once '../../Entity/PropertyListing.php';  // Assuming your PropertyListing entity is stored here

class SellerViewPropertyDetailsController {
    private $propertyListing;

    public function __construct() {
        $this->propertyListing = new PropertyListing();  // This should be your PropertyListing model class
    }

    public function handlePropertyRequest() {
        if (!isset($_GET['id'])) {
            header('Location: sellerViewListingUI.php'); // Redirect if no property ID is given
            exit;
        }

        $propertyId = $_GET['id'];
        $property = $this->getPropertyDetails($propertyId);
        if (!$property) {
            header('Location: sellerViewListingUI.php'); // Redirect if property not found
            exit;
        }
        return $property;
    }

    public function getPropertyDetails($propertyId) {
        // Fetch property details for a specific ID
        return $this->propertyListing->getAllPropertyListings($propertyId);
    }
}

?>