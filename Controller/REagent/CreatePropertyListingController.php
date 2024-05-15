<?php
require_once '../../Entity/PropertyListing.php';

class CreatePropertyListingController {
    private $propertyListing;

    public function __construct() {
        $database = new Database();  // Assumes the Database class has a method to get a connection
        $this->propertyListing = new PropertyListing($database);
    }

    public function handleFormSubmission() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $formData = [
                'price' => $_POST['price'] ?? null,
                'beds' => $_POST['beds'] ?? null,
                'baths' => $_POST['baths'] ?? null,
                'area' => $_POST['area'] ?? null,
                'address' => $_POST['address'] ?? null,
                'description' => $_POST['description'] ?? null,
                'image' => $_POST['image'] ?? null  // Assuming image handling is done separately
            ];

            if ($this->propertyListing->isDuplicate($formData['address'], $formData['price'], $formData['area'])) {
                echo "<script>alert('Duplicate property listing is not allowed.'); window.history.back();</script>";
                exit;
            }

            $result = $this->propertyListing->addListing($formData['address'], $formData['price'], $formData['area'], $formData['beds'], $formData['baths'], $formData['image'], $formData['description'], date('Y-m-d'));
            $message = $result ? "Success" : "Failed to create listing.";
            echo "<script>alert('$message'); window.location.href = 'viewPropertyListingUI.php';</script>";
            exit;
        }
    }
}
?>
