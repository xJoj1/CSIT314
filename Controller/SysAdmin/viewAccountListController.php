<?php
require_once '../../Entity/User.php'; 

class viewAccountListController {

    private $userAccount;

    public function __construct() {
        $this->userAccount = new User();
    }

    public function getAllProfiles() {
        return $this->userAccount->getAllUserAccounts();
    }
}