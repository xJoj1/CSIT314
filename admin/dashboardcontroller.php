<?php
session_start();
require("config.php");

if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}

// Function to get the count of registered users
function getRegisteredUsersCount() {
    include("config.php");
    $sql = "SELECT COUNT(*) AS count FROM user WHERE utype = 'user'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    return $row['count'];
}

// Function to get the count of agents
function getAgentsCount() {
    include("config.php");
    $sql = "SELECT COUNT(*) AS count FROM user WHERE utype = 'agent'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    return $row['count'];
}
// Function to get the count of houses
function getHousesCount() {
    include("config.php");
    $sql = "SELECT COUNT(*) AS count FROM property WHERE type = 'house'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    return $row['count'];
}

?>
