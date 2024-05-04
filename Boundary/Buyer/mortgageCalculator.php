<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buyer Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="/CSIT314/styles.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  
<!-- Navigation Bar (Logged In) -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="buyerDashboard.php">Real Estate</a>

    <!-- Toggler/Collapsible Button -->
    <button class="navbar-toggler" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto nav-links-spacing">
            <li class="nav-item">
                <a class="nav-link" href="buyerDashboard.php">Property</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active-nav" href="mortgageCalculator.php">Mortgage Calculator</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="rateNreview.php">Rating/Review</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Welcome Buyer
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../../logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </div>
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
                            <input type="number" class="form-control" id="loanAmount" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="downPayment">Down Payment:</label>
                        </div>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="downPayment" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="interestRate">Interest Rate (%):</label>
                        </div>
                        <div class="col-sm-7">
                            <input type="number" step="0.01" class="form-control" id="interestRate" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="loanTerm">Loan Term (years):</label>
                        </div>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="loanTerm" required>
                        </div>
                    </div>
                </div>
                <br>
                <div class="calculator-button">
                    <button type="button" onclick="calculateMortgage()" class="btn btn-primary" style="width: 400px;">Calculate Mortgage</button>
                </div>
            </form>
            <p id="result"></p>
        </div>
    </div>
</div>

<script>
    function calculateMortgage() {
        var loanAmount = document.getElementById('loanAmount').value;
        var downPayment = document.getElementById('downPayment').value;
        var interestRate = document.getElementById('interestRate').value;
        var loanTerm = document.getElementById('loanTerm').value;

        var monthlyInterest = (interestRate / 100) / 12;
        var numberOfPayments = loanTerm * 12;

        var monthlyPayment = (loanAmount - downPayment) * 
            (monthlyInterest * Math.pow(1 + monthlyInterest, numberOfPayments)) /
            (Math.pow(1 + monthlyInterest, numberOfPayments) - 1);

        if (!isFinite(monthlyPayment)) {
            document.getElementById('result').innerHTML = 'Please check your input values.';
        } else {
            document.getElementById('result').innerHTML = 'Monthly Payment: $' + monthlyPayment.toFixed(2);
        }
    }
</script>

</body>
</html>
