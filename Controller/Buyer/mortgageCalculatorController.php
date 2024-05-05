<?php
class MortgageCalculatorController {
    public $lastResult = null; // Property to hold the last calculated result

    public function calculateMortgage($loanAmount, $downPayment, $interestRate, $loanTerm) {
        if ($loanAmount > 0 && $interestRate > 0 && $loanTerm > 0 && $loanAmount >= $downPayment) {
            $loanPrincipal = $loanAmount - $downPayment;
            if ($loanPrincipal <= 0) {
                $this->lastResult = "Down payment must be less than the loan amount.";
                return false;
            }
            $monthlyInterest = ($interestRate / 100) / 12;
            $numberOfPayments = $loanTerm * 12;
            $monthlyPayment = $loanPrincipal * ($monthlyInterest * pow(1 + $monthlyInterest, $numberOfPayments)) / (pow(1 + $monthlyInterest, $numberOfPayments) - 1);
            $this->lastResult = "Monthly Payment: $" . round($monthlyPayment, 2);
            return true;
        } else {
            $this->lastResult = "Please check your input values.";
            return false;
        }
    }
}

// Checking if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize input data
    $loanAmount = isset($_POST['loanAmount']) ? floatval($_POST['loanAmount']) : 0;
    $downPayment = isset($_POST['downPayment']) ? floatval($_POST['downPayment']) : 0;
    $interestRate = isset($_POST['interestRate']) ? floatval($_POST['interestRate']) : 0;
    $loanTerm = isset($_POST['loanTerm']) ? intval($_POST['loanTerm']) : 0;

    // Create an instance of the calculator
    $calculator = new MortgageCalculatorController();
    $status = $calculator->calculateMortgage($loanAmount, $downPayment, $interestRate, $loanTerm);
    $result = urlencode($calculator->lastResult);

    // Redirect or handle the output as needed
    header("Location: /Boundary/Buyer/mortgageCalculatorUI.php?status=$status&result=$result");
    exit();
}
?>
