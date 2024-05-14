<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mortgage Calculator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../../styles.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Navigation Bar (Logged In) -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="buyerDashboard.php">Real Estate</a>

  <!-- Links -->
  <ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="userAccMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Property Listing
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
            <a class="dropdown-item" href="viewNewPropertyUI.php">New Property</a>
            <a class="dropdown-item" href="viewSoldPropertyUI.php">Sold Property</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="mortgageCalculatorUI.php">Mortgage Calculator</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="buyerRateAndReviewUI.php">Rating/Review</a>
    </li>
  </ul>
  <!-- Right-aligned dropdown for admin options -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Welcome Buyer
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
        <a class="dropdown-item" href="../../logout.php">Logout</a> <!-- Link to logout.php -->
      </div>
    </li>
  </ul>
</nav>

<!-- Mortgage Calculator -->
<div class="container mt-5">
    <div class="card">
        <div class="card-header">Mortgage Calculator</div>
        <div class="card-body">
            <form id="mortgage-container">
                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="loanAmount">Loan Amount:</label>
                        </div>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="loanAmount" name="loanAmount" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="downPayment">Down Payment:</label>
                        </div>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="downPayment" name="downPayment" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="interestRate">Interest Rate (%):</label>
                        </div>
                        <div class="col-sm-7">
                            <input type="number" step="0.01" class="form-control" id="interestRate" name="interestRate" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="loanTerm">Loan Term (years):</label>
                        </div>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="loanTerm" name="loanTerm" required>
                        </div>
                    </div>
                </div>
                <div class="calculator-button">
                    <button type="submit" class="btn btn-primary">Calculate Mortgage</button>
                </div>
                <!-- Result Display -->
                <br>
                <div class="form-group">
                    <div id="result" class="alert alert-info" style="display:none;">
                        <label>Payment:</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('mortgage-container').addEventListener('submit', function(e) {
    e.preventDefault();
    calculateMortgage();
});

function calculateMortgage() {
    const loanAmount = parseFloat(document.getElementById('loanAmount').value);
    const downPayment = parseFloat(document.getElementById('downPayment').value);
    const interestRate = parseFloat(document.getElementById('interestRate').value);
    const loanTerm = parseInt(document.getElementById('loanTerm').value);

    if (loanAmount > 0 && interestRate > 0 && loanTerm > 0 && loanAmount >= downPayment) {
        const loanPrincipal = loanAmount - downPayment;
        if (loanPrincipal <= 0) {
            displayResults("Down payment must be less than the loan amount.");
            return;
        }
        const monthlyInterest = (interestRate / 100) / 12;
        const numberOfPayments = loanTerm * 12;
        const monthlyPayment = loanPrincipal * (monthlyInterest * Math.pow(1 + monthlyInterest, numberOfPayments)) / (Math.pow(1 + monthlyInterest, numberOfPayments) - 1);
        displayResults(`Monthly Payment: $${monthlyPayment.toFixed(2)}`);
    } else {
        displayResults("Please check your input values.");
    }
}

function displayResults(message) {
    const resultDiv = document.getElementById('result');
    resultDiv.innerHTML = message;
    resultDiv.style.display = 'block';
}
</script>

</body>
</html>