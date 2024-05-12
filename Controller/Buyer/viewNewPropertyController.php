<?php

require_once '../../Entity/PropertyListing.php';

class viewNewPropertyController
{

    private $propertyListing;

    public function __construct()
    {

        $this->propertyListing = new PropertyListing();

    }

    public function getActiveProperties()
    {

        return $this->propertyListing->getActiveListings();

    }

}

?>