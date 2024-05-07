<?php
require_once APP_ROOT . '/entity/User.php';

class suspendedAccController
{


    public function displaySusUserList(){
        $entity = new User();
        $result = $entity->getUserList();//duowei shuzu


        $html = '';
        foreach ($result as $user) {
            //硬编码
            if ($user['username'] == 'admin'){
                continue;
            }

            if ($user['status'] == 'active'){
                continue;
            }

            $html .= <<<TR
                <div class="checkbox">
                    <input class="chkbx" type="checkbox" value={$user['user_id']} id={$user['user_id']} name="checkbox1">
                    <p>{$user['username']}</p>
                </div> 
TR;
        }

        return $html;
    }


}