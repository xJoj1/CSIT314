<?php
require_once '../../Entity/PropertyListing.php';

class searchNewPropertyController {
    private $propertyListing;

    public function __construct() {
        $this->propertyListing = new PropertyListing();
    }

    // Method to handle deciding whether to search or list all properties
    public function searchListings() {
        if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
            $searchTerm = trim($_GET['search']);
            return $this->searchPropertyListings($searchTerm);
        } else {
            return $this->getAllListings();
        }
    }

    // Retrieve all property listings from the database
    public function getAllListings() {
        return $this->propertyListing->getAllListings();
    }

    // Method to search property listings by address
    public function searchPropertyListings($searchTerm = '') {
        return $this->propertyListing->searchByAddress($searchTerm);
    }

    public function getFilteredProperties($minPrice, $maxPrice, $status) {

        return $this->propertyListing->getFilteredProperties($status, $minPrice, $maxPrice);

    }

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $controller = new viewNewPropertyController();
    $minPrice = $_POST['minPrice'];
    $maxPrice = $_POST['maxPrice'];
    $status = $_POST['status'];

    $properties = $controller->getFilteredProperties($minPrice, $maxPrice, $status);

    foreach ($properties as $property) {

        echo "<div class='col-md-4 mb-4'>";
        echo "<div class='card'>";
        echo "<img class='card-img-top' src='{$property['image_url']}' alt='Property Image'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>{$property['address']}</h5>";
        echo "<p class='card-text'>$" . number_format($property['price']) . " - {$property['size']} sqft</p>";
        echo "<p class='card-text'>{$property['beds']} bed {$property['baths']} bathroom</p>";
        echo "<a href='viewNewPropertyDetails.php?id={$property['id']}' class='btn btn-primary'>View Details</a>";
        echo "</div>";
        echo "<div class='card-footer'>";
        echo "<i class='far fa-heart favorite-icon' onclick='toggleFavorite(this)'></i>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

    }

}


