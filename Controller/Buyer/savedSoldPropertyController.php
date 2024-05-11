<?php

require_once '../../Entity/PropertyListing.php';

class savedSoldPropertyController{

    private $propertyListing;

    public function __construct(){

        $this->propertyListing = new PropertyListing();

    }

    public function getSoldAnd1Properties(){

        return $this->propertyListing->getSoldAnd1Listings();

    }

    public function updateBookmarkStatus($propertyId, $bookmark) {
        return $this->propertyListing->toggleBookmark($propertyId, $bookmark);
    }
    
    

}

?>