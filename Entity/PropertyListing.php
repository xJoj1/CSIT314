<?php
require_once '../../DBC/Database.php';  // Ensure the Database class is included

class PropertyListing {
    private $db;
    private $table = 'propertylisting';

    // Constructor receives a Database instance and retrieves a database connection
    public function __construct() {

        $database = new Database();
        $this->db = $database->getConnection();

        if ($this->db->connect_error) {

            die("Connection failed: " . $this->db->connect_error);

        }

    }

    // FOR ALL EXISTING CODE, PLEASE DO NOT RENAME / REPLACE IT WITH YOUR OWN CODE BECAUSE IT MAY AFFECT OTHER WORKING FILES THANK YOU

    public function getListingById($id) {
        $stmt = $this->db->prepare("SELECT * FROM propertylisting WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Retrieves all property listings from the database
    public function getAllListings() {
        $query = "SELECT id, address, price, size, beds, baths, image_url, description, posted_date FROM " . $this->table;
        $result = $this->db->query($query);
    
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    // view property details
    public function getAllPropertyListings($propertyId) {

        $stmt = $this->db->prepare("SELECT * FROM propertylisting WHERE id = ?");
        $stmt->bind_param("i", $propertyId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();

    }

    // Add a new property listing (PLEASE CHANGE NAMING BASED ON BCE WHEN TALL TOUCH ON THIS)
    public function addListing($address, $price, $size, $beds, $baths, $image_url, $description, $posted_date) {
        $query = "INSERT INTO " . $this->table . " (address, price, size, beds, baths, image_url, description, posted_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sdiidsss', $address, $price, $size, $beds, $baths, $image_url, $description, $posted_date);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Update an existing listing (PLEASE CHANGE NAMING BASED ON BCE WHEN TALL TOUCH ON THIS)
    public function updateListing($id, $address, $price, $size, $beds, $baths, $image_url, $description, $posted_date) {
        $query = "UPDATE propertylisting SET address=?, price=?, size=?, beds=?, baths=?, image_url=?, description=?, posted_date=? WHERE id=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sdiidsssi', $address, $price, $size, $beds, $baths, $image_url, $description, $posted_date, $id);
        return $stmt->execute();
    }

    // Deletes a property listing from the database based on an ID
    public function removePropertyListing($propertyId) {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $propertyId);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // this is used to check for duplicate !!
    public function isDuplicate($address, $price, $area) {
        $query = "SELECT id FROM " . $this->table . " WHERE address = ? AND price = ? AND size = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sdi', $address, $price, $area);  // 'sdi' corresponds to string, double, integer types
        $stmt->execute();
        $stmt->store_result();

        return $stmt->num_rows > 0;  // Returns true if a duplicate is found, false otherwise
    }

    // searching Property by address
    public function searchByAddress($searchTerm = '') {
        $searchTerm = "%$searchTerm%";
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE address LIKE ?");
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    // for seller sold property
    public function getSoldListings() {
        $query = "SELECT * FROM " . $this->table . " WHERE status = 'sold'";
        $result = $this->db->query($query);
    
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    // search sold property
    public function searchSoldPropertiesByAddress($searchTerm) {
        $searchTerm = "%" . $searchTerm . "%";
        $query = "SELECT * FROM " . $this->table . " WHERE status = 'sold' AND address LIKE ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // for seller to retrieve active listing
    public function getActiveListings() {
        $query = "SELECT id, address, price, size, beds, baths, image_url, description, posted_date FROM " . $this->table . " WHERE status = 'active'";
        $result = $this->db->query($query);
    
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    // view count for engagement metrics
    public function incrementViews($propertyId) {
        $query = "UPDATE " . $this->table . " SET views = views + 1 WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $propertyId);
        if (!$stmt->execute()) {
            error_log("Error incrementing views: " . $stmt->error);  // Log errors
        }
    }

    public function getFilteredProperties($status, $minPrice, $maxPrice) {
        $query = "SELECT * FROM propertylisting WHERE price BETWEEN ? AND ? AND status = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("dds", $minPrice, $maxPrice, $status);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEngagementMetrics() {
        $query = "SELECT id, address AS PropertyName, shortlist_count AS Shortlisted, views FROM propertylisting";
        $result = $this->db->query($query);
        if (!$result) {
            die('MySQL query failed with error: ' . $this->db->error);
        }
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
}
?>