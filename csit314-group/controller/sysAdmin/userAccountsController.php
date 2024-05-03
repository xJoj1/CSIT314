<?php
require_once APP_ROOT . '/entity/UserAccounts.php';

class userAccountsController
{

    public function displayUserAccounts(){
        $entity = new UserAccounts();
        $result = $entity->getUserList();//duowei shuzu

        $html = '';
        foreach ($result as $user) {
            $html .= <<<TR
<tr>
<td>
<div class="checkbox">
<input class="chkbx" type="checkbox" id={$user['uid']} name="checkbox1">
<p>{$user['uname']}</p>
</div>
</td>
</tr>
TR;
        }

        return $html;
    }

    public function example1(){

    }

    public function example2(){}

    public function example3(){}

    public function example4(){}

}