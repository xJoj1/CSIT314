<?php
require_once '../../Entity/PropertyListing.php';
$propertyListing = new PropertyListing();

$status = $_POST['status'] ?? 'active';
$minPrice = $_POST['minPrice'] ?? 0;
$maxPrice = $_POST['maxPrice'] ?? 1000000;

$filteredProperties = $propertyListing->getFilteredProperties($status, $minPrice, $maxPrice);

if (!$filteredProperties) {

    echo 'No properties found. Check query and database connectivity.';

} else {

    foreach ($filteredProperties as $property) {

        echo '<div class="col-md-4 mb-4">';
        echo '<div class="card">';
        echo '<img class="card-img-top" src="' . htmlspecialchars($property['image_url']) . '" alt="Property Image">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . htmlspecialchars($property['address']) . '</h5>';
        echo '<p class="card-text">$' . number_format($property['price']) . ' - ' . $property['size'] . ' sqft ' . $property['beds'] . ' bed ' . $property['baths'] . ' bathroom</p>';
        echo '<a href="viewPropertyDetailsUI.php?id=' . htmlspecialchars($property['id']) . '" class="btn btn-primary">View Details</a>';
        echo '</div>';
        echo '<div class="card-footer">';
        echo '<i class="far fa-heart favorite-icon" onclick="toggleFavorite(this)"></i>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

    }

}