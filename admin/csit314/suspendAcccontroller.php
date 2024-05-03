<?php
include "UserAccentity.php"; // Make sure to change the filename if necessary
include ("config.php");

class SuspendAccController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getSuspendedUsers() {
        $suspendEntity = new UserEntity($this->conn);
        return $suspendEntity->getSuspendedUsers();
    }

    public function unsuspendUser($userId) {
        $suspendEntity = new UserEntity($this->conn);
        return $suspendEntity->unsuspendUser($userId);
    }
}

?>

