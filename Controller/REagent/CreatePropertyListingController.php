<?php
require_once '../../Entity/PropertyListing.php';
require_once '../../DBC/Database.php';

class CreatePropertyListingController {
    private $propertyListing;

    public function __construct() {
        $database = new Database();  // Assumes the Database class has a method to get a connection
        $this->propertyListing = new PropertyListing($database);
    }

    public function createListing($formData) {
        // Extract data from form data
        $price = $formData['price'];
        $beds = $formData['beds'];
        $baths = $formData['baths'];
        $area = $formData['area'];
        $address = $formData['address'];
        $description = $formData['description'];
        $image = $formData['image'];  // This would be the path or image data

        // Validate data
        if (!$this->validateData($price, $beds, $baths, $area, $address, $description)) {
            return "Validation failed. Please check input data.";
        }

        // Check for duplicate listings
        if ($this->propertyListing->isDuplicate($address, $price, $area)) {
            return "Duplicate property listing is not allowed.";
        }

        // Save listing
        $result = $this->propertyListing->addListing($address, $price, $area, $beds, $baths, $image, $description, date('Y-m-d'));

        if ($result) {
            return "Success";
        } else {
            return "Failed to create listing.";
        }
    }

    private function validateData($price, $beds, $baths, $area, $address, $description) {
        // Implement validation logic here
        return true; // Simplified for example purposes
    }
}
?>
