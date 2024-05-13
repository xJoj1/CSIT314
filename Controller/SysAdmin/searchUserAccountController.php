<?php

require_once '../../Entity/User.php'; // Adjust this path to the correct location of your UserProfile model


class searchUserAccountController
{
    private $userAccounts;

    public function __construct() {

        $this->userAccounts = new User();

    }
    public function getUserByName($searchTerm = '')
    {
        return $this->userAccounts->getUserByName($searchTerm);
    }
}