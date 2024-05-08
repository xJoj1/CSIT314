<?php
require_once '../../Entity/PropertyListing.php'; // Ensure the PropertyListing class is included

class removePropertyListingController {
    private $propertyListingModel;

    public function __construct(PropertyListing $propertyListingModel) {
        $this->propertyListingModel = $propertyListingModel;
    }

    public function removeProperty() {
        $responseContent = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_ids'])) {
            $idsToRemove = $_POST['remove_ids'];
            $removalSuccess = true;
            foreach ($idsToRemove as $id) {
                if (!$this->removePropertyListing($id)) {
                    $removalSuccess = false; // Set to false if any removal fails
                }
            }
            $responseContent .= $this->generateAlertHtml($removalSuccess);
        }
        return $responseContent;
    }

    private function generateAlertHtml($success) {
        if ($success) {
            return "<div class='alert alert-success'>Selected listings have been removed.</div>";
        } else {
            return "<div class='alert alert-danger'>Failed to remove listings.</div>";
        }
    }

    private function removePropertyListing($propertyId) {
        return $this->propertyListingModel->removePropertyListing($propertyId);
    }
}
?>