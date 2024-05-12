<?php
require_once '../../Entity/User.php'; 

class viewAccountListController {

    private $userAccount;

    public function __construct() {
        $this->userAccount = new User();
    }
    
    public function getAllAccounts() {
        return $this->userAccount->getAllUserAccounts();
    }

    // Add method to fetch multiple user accounts by IDs
    public function getUserById($userId) {
        return $this->userAccount->findUserById($userId);
    }
}