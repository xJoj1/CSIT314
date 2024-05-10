<?php
require_once '../../Entity/PropertyListing.php';

class viewSoldPropertyDetailsController
{

    private $propertyListing;

    public function __construct()
    {

        $this->propertyListing = new PropertyListing();

    }

    public function handlePropertyRequest($id)
    {

        if (empty($id)) {

            header('Location: viewNewPropertyUI.php');
            exit;

        }

        if (isset($_GET['increment_views']) && $_GET['increment_views'] == 1) {

            error_log("Incrementing views for sold property ID: " . $id);
            $this->propertyListing->incrementViews($id);

        }

        return $this->propertyListing->getListingById($id);

    }

}