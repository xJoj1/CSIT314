<?php
require_once '../../Entity/PropertyListing.php';

class SellerSoldDetailsController {
    private $propertyListing;

    public function __construct() {
        $this->propertyListing = new PropertyListing();
    }

    public function handlePropertyRequest($id) {
        if (empty($id)) {
            header('Location: sellerSoldPropertyUI.php'); // Redirect if no property ID is given
            exit;
        }
        return $this->propertyListing->getListingById($id);
    }
}
?>
