<?php
require_once '../../Entity/User.php'; // Adjust the path to where your UserProfile class is located

class suspendUserAccountController
{
    private $userAccounts;

    public function __construct()
    {
        $this->userAccounts = new User();
    }

    public function getUserById($userId = "")
    {
        return $this->userAccounts->getUserById($userId);
    }

    public function suspendUser($userID){
        return $this->userAccounts->suspendUser($userID);
    }

    public function suspendUserList($userList){
        return $this->userAccounts->suspendUserList($userList);
    }
}