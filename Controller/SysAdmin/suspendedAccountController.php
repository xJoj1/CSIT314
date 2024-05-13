<?php
require_once '../../Entity/User.php';


class suspendedAccountController
{
    private $userAccounts;

    public function __construct()
    {
        $this->userAccounts = new User();
    }

    public function unSuspendUserList($userList){
        return $this->userAccounts->usSuspendUserList($userList);
    }

    public function getAlluserAccount()
    {
        return $this->userAccounts->getAllUserAccounts();
    }

    public function getSuspendedUserAccount()
    {
        return $this->userAccounts->getSuspendedUserAccounts();
    }

}