<?php
require_once APP_ROOT . '/entity/UserAccounts.php';

class userAccountsController
{

    public function displayUserAccounts(){
        $entity = new UserAccounts();
        $result = $entity->getUserList();//duowei shuzu


        $html = '';
        foreach ($result as $user) {
            //硬编码
            if ($user['username'] == 'admin'){
                continue;
            }

            if ($user['status'] == 'inactive'){
                continue;
            }

            $html .= <<<TR
<tr>
<td>
<div class="checkbox">
<input class="chkbx" type="checkbox" value={$user['user_id']} id={$user['user_id']} name="checkbox1">
<p>{$user['username']}</p>
</div>
</td>
</tr>
TR;
        }

        return $html;
    }



    public function suspendUsers($checkedValues)
    {
        $entity = new UserAccounts();
        foreach ($checkedValues as $value) {
            $entity->setStatusInactive($value);
        }
    }

}