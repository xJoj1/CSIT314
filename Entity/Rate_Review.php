<?php
require_once '../../DBC/Database.php';  // Ensure the Database class is included for database connection

class Rate_Review {
    private $db;
    private $table = 'rating_reviews';  // The name of the table for ratings and reviews

    // Constructor initializes the database connection
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();

        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    // Method to add a new rating and review to the database
    public function addRateReview($userType, $userID, $agentID, $rating, $review) {
        // Prepare the SQL statement
        $stmt = $this->db->prepare("INSERT INTO " . $this->table . " (UserType, UserID, AgentID, Rating, Review, ReviewDate) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param('siisi', $userType, $userID, $agentID, $rating, $review);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            return true;
        } else {
            // Optionally, log this error to a file or a system log
            error_log("Error in executing insertion: " . $stmt->error);
            return false;
        }
    }
}
?>