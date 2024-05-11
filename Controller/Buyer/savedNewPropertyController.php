<?php

require_once '../../Entity/PropertyListing.php';

class savedNewPropertyController{

    private $propertyListing;

    public function __construct(){

        $this->propertyListing = new PropertyListing();

    }

    public function getActiveAnd1Properties(){

        return $this->propertyListing->getActiveAnd1Listings();

    }

    public function updateBookmarkStatus($propertyId, $bookmark) {
        return $this->propertyListing->toggleBookmark($propertyId, $bookmark);
    }
    
    

}

?>