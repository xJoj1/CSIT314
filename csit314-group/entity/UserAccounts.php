<?php
require_once APP_ROOT . '/entity/EntityCommon.php';

class UserAccounts extends EntityCommon
{

    //get list from sql base
    public function getUserList()
    {
        $sql = <<<SQL
select * from `user`
SQL;
        return $this->db->queryAll($sql);
    }

    //Login
    public function setUserInfoSession($userName,$password){
        $sql = <<<SQL
SELECT * FROM `user` WHERE `uname` = '{$userName}'  AND `upass` = '{$password}'
SQL;

        //假定有用户， 先写这样 之后再来完善要是没有用户该怎么办
        $result = $this->db->queryAll($sql);
        $_SESSION['loginStatus'] = true;
        $_SESSION['uid'] = $result[0]['uid'];
        $_SESSION['uname'] = $result[0]['uname'];
        $_SESSION['utype'] = $result[0]['utype'];
    }



    //check user's account if is correct, then return the user type
    public function getUserType($userName, $password){

        $sql = <<<SQL
SELECT * FROM `user` WHERE `uname` = '{$userName}'  AND `upass` = '{$password}'
SQL;
        $result = $this->db->queryAll($sql);
//        dump($result);

        if (!empty($result)) {
            // return only one
            return $result[0]['utype'];
        } else {
            return false;  // if no such user return this
        }
    }



    public function createUserAcc($data = []){
        $sql = <<<SQL
INSERT INTO `user` 
(`uname`, `uid`, `upass`, `birthdate`, `utype` ,`address`, `uphone`)
VALUES
('{$data['uname']}', '{$data['uid']}', '{$data['upass']}', '{$data['birthdate']}','{$data['utype']}', '{$data['address']}', '{$data['uphone']}')

SQL;

        $this->db->exec($sql);
        return true;
    }


    //getDb connection address

}