<?php
require_once '../../DBC/Database.php';  // Ensure the Database class is included

class PropertyListing {
    private $db;
    private $table = 'propertylisting';

    // Constructor receives a Database instance and retrieves a database connection
    public function __construct(Database $database) {
        $this->db = $database->getConnection();
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
        $query = "UPDATE " . $this->table . " SET address=?, price=?, size=?, beds=?, baths=?, image_url=?, description=?, posted_date=? WHERE id=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sdiidsssi', $address, $price, $size, $beds, $baths, $image_url, $description, $posted_date, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
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
}
?>