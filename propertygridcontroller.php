<?php 
// Include necessary files
include("config.php");

// Initialize variables
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : '';
$stype = isset($_REQUEST['stype']) ? $_REQUEST['stype'] : '';
$city = isset($_REQUEST['city']) ? $_REQUEST['city'] : '';

// Query to fetch property data based on filter criteria
$sql = "SELECT property.*, user.uname FROM `property`,`user` WHERE property.uid=user.uid";

if (!empty($type)) {
    $sql .= " AND type='$type'";
}
if (!empty($stype)) {
    $sql .= " AND stype='$stype'";
}
if (!empty($city)) {
    $sql .= " AND city='$city'";
}

$result = mysqli_query($con, $sql);

// Initialize array to store property data
$properties = [];

// Check if query executed successfully
if ($result) {
    // Fetch property details
    while ($row = mysqli_fetch_array($result)) {
        // Store property details in array
        $properties[] = $row;
    }
} else {
    // Handle database query error
    $properties = [];
}

// Calculate EMI if the form is submitted
$amount = isset($_POST['amount']) ? $_POST['amount'] : 0;
$mon = isset($_POST['month']) ? $_POST['month'] : 0;
$int = isset($_POST['interest']) ? $_POST['interest'] : 0;
$interest = 0;
$pay = 0;
$month = 0;

if (isset($_POST['calc'])) {
    // Calculate interest, total payment, and monthly payment
    $interest = $amount * $int / 100;
    $pay = $amount + $interest;
    $month = $pay / $mon;
}

// Close database connection
mysqli_close($con);

// Include the boundary file
include("propertygrid.php");
?>

?>
