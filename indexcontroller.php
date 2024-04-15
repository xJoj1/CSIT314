<?php
session_start();
include("config.php");

// Process search form submission
if (isset($_POST['filter'])) {
    $type = $_POST['type'];
    $stype = $_POST['stype'];
    $city = $_POST['city'];
    // Assuming a function that handles the property search
    searchProperties($type, $stype, $city);
}

// Functions for handling different business logic
function searchProperties($type, $stype, $city) {
    // Connect to the database and execute query
    $con = dbConnect();  // Assuming dbConnect() returns a database connection
    $query = mysqli_query($con, "SELECT * FROM `property` WHERE type='$type' AND stype='$stype' AND city LIKE '%$city%'");
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function getRecentProperties() {
    $con = dbConnect();
    $query = mysqli_query($con, "SELECT property.*, user.uname, user.utype, user.uimage FROM `property`, `user` WHERE property.uid=user.uid ORDER BY date DESC LIMIT 9");
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function dbConnect() {
    // Placeholder for database connection logic
    include("config.php");
    return $con;
}
?>
