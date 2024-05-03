<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'real_estate';
    private $username = 'root';
    private $password = '';
    private $conn;

    // Get the database connection
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

            // Check connection
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>
