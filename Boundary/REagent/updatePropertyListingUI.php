<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Property Listing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../styles.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
    require_once '../../Controller/REagent/UpdatePropertyListingController.php';

    $controller = new UpdatePropertyListingController();
    
    try {
        $propertyDetails = $controller->processRequest();
    } catch (Exception $e) {
        echo "<script>alert('" . $e->getMessage() . "'); window.location.href = 'viewPropertyListingUI.php';</script>";
        exit;
    }
    ?>

    <!-- Navigation Bar (Logged In) -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="REdashboard.php">Real Estate</a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="REdashboard.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="viewPropertyListingUI.php">House Listing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="viewRatingReview.php">Rating/Review</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Welcome Agent
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminMenu">
                    <a class="dropdown-item" href="../../logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="container mt-5">
        <div class="create-container">
            <a href="viewPropertyListingUI.php" class="back-arrow">‹</a>
            <h2>Update Property Listing</h2>
            <form id="propertyForm" onsubmit="return validateForm()" method="post" enctype="multipart/form-data" novalidate>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" id="price" name="price" value="<?= htmlspecialchars($propertyDetails['price']); ?>">
                </div>
                
                <div class="form-group">
                    <label for="beds">Bed:</label>
                    <select class="form-control" id="beds" name="beds">
                        <!-- Dynamically select the option based on the value -->
                        <option value="1" <?= $propertyDetails['beds'] == 1 ? 'selected' : ''; ?>>1</option>
                        <option value="2" <?= $propertyDetails['beds'] == 2 ? 'selected' : ''; ?>>2</option>
                        <option value="3" <?= $propertyDetails['beds'] == 3 ? 'selected' : ''; ?>>3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="baths">Bath:</label>
                    <select class="form-control" id="baths" name="baths">
                        <option value="1" <?= $propertyDetails['baths'] == 1 ? 'selected' : ''; ?>>1</option>
                        <option value="2" <?= $propertyDetails['baths'] == 2 ? 'selected' : ''; ?>>2</option>
                        <option value="3" <?= $propertyDetails['baths'] == 3 ? 'selected' : ''; ?>>3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="area">Area:</label>
                    <input type="text" class="form-control" id="area" name="area" value="<?= htmlspecialchars($propertyDetails['size']); ?>">
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?= htmlspecialchars($propertyDetails['address']); ?>">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3"><?= htmlspecialchars($propertyDetails['description']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image URL:</label>
                    <input type="text" class="form-control" id="image" name="image" value="<?= htmlspecialchars($propertyDetails['image_url']); ?>">
                </div>
                <input type="hidden" name="property_id" value="<?= $propertyDetails['id']; ?>">
                <!-- Confirm button -->
                <div class="form-group mt-5">
                    <button type="submit" class="btn btn-primary btn-block">Confirm</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function validateForm() {
        var price = document.getElementById("price").value;
        var area = document.getElementById("area").value;
        var address = document.getElementById("address").value;
        var description = document.getElementById("description").value;
        var image = document.getElementById("image").value;

        var isValid = true;
        var errorMessage = "";

        // Validate Price
        if (!price) {
            errorMessage += "Please enter the price.\\n";
            isValid = false;
        } else if (!/^\$?\d+(,\d{3})*(\.\d{1,2})?$/.test(price)) {
            errorMessage += "Invalid price format. Use like $150,000.\\n";
            isValid = false;
        }

        // Validate Area
        if (!area) {
            errorMessage += "Please enter the area.\\n";
            isValid = false;
        } else if (!/^\d+$/.test(area.replace(/\s*sqft\s*/, ''))) {
            errorMessage += "Area should be a numeric value indicating square feet.\\n";
            isValid = false;
        }

        // Validate Address
        if (!address) {
            errorMessage += "Please enter the address.\\n";
            isValid = false;
        }

        // Validate Description
        if (!description) {
            errorMessage += "Please enter a description.\\n";
            isValid = false;
        }

        if (!image) {
            errorMessage += "Please enter the image URL.\\n";
            isValid = false;
        }

        // Show error messages
        if (!isValid) {
            alert("Validation Error:\\n" + errorMessage);
        }

        return isValid;
    }
    </script>
</body>
</html>
