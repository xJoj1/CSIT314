<?php
require_once APP_ROOT . '/entity/EntityCommon.php';

class UserAccounts extends EntityCommon
{

    //get list from sql base
    public function getUserList()
    {
        $sql = <<<SQL
select * from `users`
SQL;
        return $this->db->queryAll($sql);
    }

    //Login
    public function getUserInfoSession($userName,$password){
        $sql = <<<SQL
SELECT * FROM `users` WHERE `username` = '{$userName}'  AND `password` = '{$password}'
SQL;

        //假定有用户， 先写这样 之后再来完善要是没有用户该怎么办
        $result = $this->db->queryAll($sql);

        return $result;
    }



    //check user's account if is correct, then return the user type
    public function getUserType($userName, $password){

        $sql = <<<SQL
SELECT * FROM `users` WHERE `username` = '{$userName}'  AND `password` = '{$password}'
SQL;
        $result = $this->db->queryAll($sql);
//        dump($result);

        if (!empty($result)) {
            // return only one
            return $result[0]['profile_type'];
        } else {
            return false;  // if no such user return this
        }
    }



    public function createUserAcc($data = []){
        $sql = <<<SQL
INSERT INTO `users` 
(`username`, `user_id`, `password`, `birthdate`, `profile_type` ,`address`, `contact`)
VALUES
('{$data['username']}', '{$data['user_id']}', '{$data['password']}', '{$data['birthdate']}','{$data['profile_type']}', '{$data['address']}', '{$data['contact']}')

SQL;

        $this->db->exec($sql);
        return true;
    }


    //getDb connection address
    public function getUserByID($userID)
    {
        $sql = <<<SQL
SELECT * FROM `users` WHERE `user_id` = '{$userID}'
SQL;

        return $this->db->queryAll($sql);
    }




    public function editUserInfo($userID, $data = [])
    {

        $sql = <<<SQL
UPDATE users
SET
    user_id = '{$data['user_id']}',
    username = '{$data['username']}',
    password = '{$data['password']}',
    profile_type = '{$data['profile_type']}',
    birthdate = '{$data['birthdate']}',
    address = '{$data['address']}',
    contact = '{$data['contact']}'
WHERE user_id = '$userID';
SQL;

        $this->db->exec($sql);

        return true;
    }

    public function setStatusInactive($userID){
        $sql = <<<SQL
UPDATE users
SET
    status = 'inactive'
WHERE user_id = '$userID';
SQL;

        $this->db->exec($sql);

        return true;
    }

    public function setStatusActive($userID){
        $sql = <<<SQL
UPDATE users
SET
    status = 'active'
WHERE user_id = '$userID';
SQL;

        $this->db->exec($sql);

        return true;
    }

}