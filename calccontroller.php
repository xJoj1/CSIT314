// Include necessary files
<?php
include("config.php");

// Initialize variables
$amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : 0;
$mon = isset($_REQUEST['month']) ? $_REQUEST['month'] : 0;
$int = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : 0;
$interest = 0;
$pay = 0;
$month = 0;

// Calculate only if the form is submitted
if(isset($_REQUEST['calc'])) {
    // Calculate interest, total payment, and monthly payment
    $interest = $amount * $int / 100;
    $pay = $amount + $interest;
    $month = $pay / $mon;
}

?>