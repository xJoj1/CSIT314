    <?php
    require_once 'PropertyListing.php';

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

            // Check if the increment_views parameter is set and increment views if necessary
            if (isset($_GET['increment_views']) && $_GET['increment_views'] == 1) {
                error_log("Incrementing views for sold property ID: " . $id);  // Debug log
                $this->propertyListing->incrementViews($id);
            }
            return $this->propertyListing->getListingById($id);
        }
    }
    ?>
