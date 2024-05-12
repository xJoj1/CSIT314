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

    // Accessor for the database connection
    public function getDb() {
        return $this->db;
    }

    // Method to add a new rating and review to the database
    public function addRateReview($userType, $userID, $agentID, $rating, $review) {
        // Prepare the SQL statement
        $stmt = $this->db->prepare("INSERT INTO " . $this->table . " (UserType, UserID, AgentID, Rating, Review, ReviewDate) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param('siiss', $userType, $userID, $agentID, $rating, $review);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            return true;
        } else {
            // Optionally, log this error to a file or a system log
            error_log("Error in executing insertion: " . $stmt->error);
            return false;
        }
    }

    // Method to get all reviews from the database
    public function getAllReviews() {
        $sql = "SELECT * FROM " . $this->table . " ORDER BY ReviewDate DESC";
        $result = $this->db->query($sql);
        $reviews = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $reviews[] = $row;
            }
        }
        return $reviews;
    }

    // Method to get counts of each rating
    public function getRatingCounts() {
        $sql = "SELECT Rating, COUNT(*) as Count FROM " . $this->table . " GROUP BY Rating";
        $result = $this->db->query($sql);
        $ratingCounts = ['1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0]; // Initialize counts for all ratings

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ratingCounts[$row['Rating']] = (int)$row['Count'];
            }
        }
        return $ratingCounts;
    }
}
?>