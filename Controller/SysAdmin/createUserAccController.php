<?php

require_once APP_ROOT . '/entity/User.php';


class createUserAccController
{

    //先直接操作，待会看看需不需要返回结果
    public function createUserAcc($data = []){
        $user = new User();
        $user->createUserAcc($data);
    }

}