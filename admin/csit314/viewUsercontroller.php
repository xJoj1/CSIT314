<?php
include "UserAccentity.php"; // Include the entity file
include "config.php";
class UserViewController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getUserDetails($username) {
        $userEntity = new UserEntity($this->conn);
        return $userEntity->getUserDetails($username);
    }
}
?>
