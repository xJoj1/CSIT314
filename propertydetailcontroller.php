<?php
// Include necessary files
include("config.php");

// Controller logic
if (isset($_REQUEST['pid'])) {
    // Get property ID from request
    $propertyId = $_REQUEST['pid'];

    // Query to fetch property details
    $query = mysqli_query($con, "SELECT property.*, user.* FROM `property`,`user` WHERE property.uid=user.uid and pid='$propertyId'");
    
    // Check if query executed successfully
    if ($query) {
        // Fetch property details
        $row = mysqli_fetch_array($query);

        // Check if property details are found
        if ($row) {
            // Property found, pass details to the view
            
        } else {
            // Property not found, handle error
            echo "Property not found!";
        }
    } else {
        // Handle database query error
        echo "Database query error!";
    }

    // Close database connection
    mysqli_close($con);
} else {
    // Property ID not provided, handle error
    echo "Property ID not provided!";
}
?>
