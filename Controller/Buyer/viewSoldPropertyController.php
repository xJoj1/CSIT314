<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../Entity/PropertyListing.php';

class viewSoldPropertyController {

    private $propertyListing;

    public function __construct() {

        $this->propertyListing = new PropertyListing();

    }

    public function getSoldProperties() {

        return $this->propertyListing->getSoldListings();

    }

    public function getFilteredProperties($minPrice, $maxPrice, $status) {

        return $this->propertyListing->getFilteredProperties($status, $minPrice, $maxPrice);

    }

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $controller = new viewSoldPropertyController();
    $minPrice = $_POST['minPrice'];
    $maxPrice = $_POST['maxPrice'];
    $status = $_POST['status'];

    $properties = $controller->getFilteredProperties($minPrice, $maxPrice, $status);

    foreach ($properties as $listing) {

        echo "<div class='col-md-4 mb-4'>";
        echo "<div class='card'>";
        echo "<img class='card-img-top' src='{$listing['image_url']}' alt='Property Image'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>{$listing['address']}</h5>";
        echo "<p class='card-text'>$" . number_format($listing['price']) . " - {$listing['size']} sqft</p>";
        echo "<p class='card-text'>{$listing['beds']} bed {$listing['baths']} bathroom</p>";
        echo "<a href='viewSoldPropertyDetails.php?id={$listing['id']}' class='btn btn-primary'>View Details</a>";
        echo "</div>";
        echo "<div class='card-footer'>";
        echo "<i class='far fa-heart favorite-icon' onclick='toggleFavorite(this)'></i>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

    }

    exit;
}

?>