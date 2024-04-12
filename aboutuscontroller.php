
<?php
include("config.php");

$aboutData = array();

$query = mysqli_query($con, "SELECT * FROM about");

if ($query) {
    while ($row = mysqli_fetch_assoc($query)) {
        $aboutData[] = $row;
    }
} else {
    // Handle query execution error
    echo "Error executing query: " . mysqli_error($con);
}

mysqli_close($con);
?>
