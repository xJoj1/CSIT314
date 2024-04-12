<?php 
include("config.php");

$query = mysqli_query($con, "SELECT * FROM user WHERE utype='agent'");
$agents = array();

while ($row = mysqli_fetch_array($query)) {
    $agents[] = $row;
}
?>
