<?php
require_once '../../Entity/User.php';

class viewUserAccountDetailController {
    private $userEntity;

    public function __construct() {
        $this->userEntity = new User();
    }

    public function getUsers() {
        if (!isset($_GET['user_ids'])) {
            header('Location: viewUserAccountListUI.php'); // Redirect if no user IDs are given
            exit;
        }

        $userIds = explode(',', $_GET['user_ids']);
        $users = [];
        foreach ($userIds as $userId) {
            $user = $this->getUserById($userId);
            if ($user) {
                $users[] = $user;
            }
        }
        return $users;
    }

    public function getUserById($userId) {
        return $this->userEntity->findUserById($userId);
    }
}
?>