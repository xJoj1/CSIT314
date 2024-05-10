<?php

require_once '../../Entity/PropertyListing.php';

class viewSoldPropertyController
{

    private $propertyListing;

    public function __construct()
    {

        $this->propertyListing = new PropertyListing();

    }

    public function getSoldProperties()
    {

        return $this->propertyListing->getSoldListings();

    }

}

?>