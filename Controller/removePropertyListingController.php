<?php
require_once '../../Entity/PropertyListing.php'; // Ensure the PropertyListing class is included

class removePropertyListingController {
    private $propertyListingModel;

    public function __construct(PropertyListing $propertyListingModel) {
        $this->propertyListingModel = $propertyListingModel;
    }

    public function removePropertyListing($propertyId) {
        $result = $this->propertyListingModel->removePropertyListing($propertyId);
        if ($result) {
            return "Property Listing Removed Successfully";
        } else {
            return "Error Removing Property Listing";
        }
    }
}
?>