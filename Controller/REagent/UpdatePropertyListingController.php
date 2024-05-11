<?php
require_once '../../Entity/PropertyListing.php';

class UpdatePropertyListingController {
    private $propertyListing;

    public function __construct() {
        $this->propertyListing = new PropertyListing();
    }

    // This function will manage checking and routing the request
    public function processRequest() {
        // Handle POST request for updates
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->handleUpdate($_POST);
            return; // Stop further processing to wait for redirect
        }

        // Handle GET request to fetch property details
        if (isset($_GET['property_id'])) {
            return $this->getPropertyDetails($_GET['property_id']);
        } else {
            throw new Exception("No property ID provided.");
        }
    }

    // Fetch property details for editing
    public function getPropertyDetails($propertyId) {
        if (empty($propertyId)) {
            throw new Exception("Property ID is required");
        }
        $propertyDetails = $this->propertyListing->getListingById($propertyId);
        if (!$propertyDetails) {
            throw new Exception("No property found.");
        }
        return $propertyDetails;
    }

    // Handle the property update request
    public function handleUpdate($data) {
        $propertyId = $data['property_id'] ?? null;
        $address = $data['address'] ?? null;
        $price = $data['price'] ?? null;
        $size = $data['area'] ?? null;
        $beds = $data['beds'] ?? null;
        $baths = $data['baths'] ?? null;
        $image_url = $data['image'] ?? null;
        $description = $data['description'] ?? null;
        $posted_date = date('Y-m-d'); // Assuming you want to update the posted date; adjust as necessary

        if (empty($propertyId) || empty($address) || empty($price)) {
            throw new Exception("Required fields must be filled out");
        }

        $result = $this->propertyListing->updateListing($propertyId, $address, $price, $size, $beds, $baths, $image_url, $description, $posted_date);
        if ($result) {
            header("Location: viewPropertyListingUI.php?status=success");
            exit;
        } else {
            throw new Exception("Failed to update the property listing.");
        }
    }
}
?>