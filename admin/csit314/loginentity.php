<?php
require_once("config2.php");

class loginEntity {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function validateLogin($username, $password, $usertype) {
        $sql = "SELECT uid FROM user WHERE uname = ? AND upass = ? AND utype = ? AND suspend = 'no'";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $username, $password, $usertype);
        $stmt->execute();
        $result = $stmt->get_result();

        // Debugging: Check if SQL query is executed correctly
        if (!$result) {
            echo "Error executing SQL query: " . $this->conn->error;
            exit();
        }

        // Debugging: Check if any rows are returned
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row['uid'];
        } else {
            return false;
        }
    }
}
?>
