<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../Entity/PropertyListing.php';

class viewNewPropertyController {

    private $propertyListing;

    public function __construct() {

        $this->propertyListing = new PropertyListing();

    }

    public function getActiveProperties() {

        return $this->propertyListing->getActiveListings();

    }

    public function getFilteredProperties($minPrice, $maxPrice, $status) {

        return $this->propertyListing->getFilteredProperties($status, $minPrice, $maxPrice);

    }

    public function updateBookmarkStatus($propertyId, $bookmark, $incrementShortlist) {
        if ($incrementShortlist) {
            $this->propertyListing->incrementShortlist($propertyId);
        }
        return $this->propertyListing->toggleBookmark($propertyId, $bookmark);
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

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['propertyId'], $_POST['bookmark'])) {
        $propertyId = $_POST['propertyId'];
        $bookmark = $_POST['bookmark'];  // This should be either '0' or '1' based on the form input
    
        $incrementShortlist = isset($_POST['incrementShortlist']) ? $_POST['incrementShortlist'] : 0;

        // Call a method in the controller to update the bookmark status
        $controller->updateBookmarkStatus($propertyId, $bookmark, $incrementShortlist);
    
        // Redirect back to avoid form resubmission issues
        header('Location: viewNewPropertyUI.php');
        exit;
    }

    exit;
}
?>