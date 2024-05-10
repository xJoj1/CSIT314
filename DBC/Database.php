<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'real_estate';
    private $username = 'root';
    private $password = '';
    private $conn;

    public $db = null;

    public function getConnection() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        return $this->conn;
    }



    public function __construct()
    {
        //use mysqli to connect database
        $this->db = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        if (mysqli_connect_errno()) {
            echo '<p>Error: Could not connect to database.<br/>Please try again later.</p>';
            exit;
        }
        return $this->db;
    }

    public function queryAll($query = '')
    {
        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            return [];
        }
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //
    public function exec($query = '')
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }
}
?>
