<?php
include("config.php");

// Fetch featured properties
$featuredQuery = "SELECT * FROM `property` WHERE isFeatured = 1 ORDER BY date DESC LIMIT 3";
$featuredResult = mysqli_query($con, $featuredQuery);
$featuredProperties = mysqli_fetch_all($featuredResult, MYSQLI_ASSOC);

// Fetch recent properties
$recentQuery = "SELECT * FROM `property` ORDER BY date DESC LIMIT 6";
$recentResult = mysqli_query($con, $recentQuery);
$recentProperties = mysqli_fetch_all($recentResult, MYSQLI_ASSOC);

// Fetch properties for the property grid
$gridQuery = "SELECT property.*, user.uname, user.utype, user.uimage FROM `property` JOIN `user` ON property.uid=user.uid";
$gridResult = mysqli_query($con, $gridQuery);
$propertyGrid = mysqli_fetch_all($gridResult, MYSQLI_ASSOC);

// Handle errors if needed
if (!$featuredResult || !$recentResult || !$gridResult) {
    echo "Failed to fetch data: " . mysqli_error($con);
}
?>
