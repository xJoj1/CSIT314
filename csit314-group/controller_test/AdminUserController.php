<?php

require_once APP_ROOT . '/entity/UserAccounts.php';
class AdminUserController
{
    public function getUserList()
    {
        $entity = new UserAccounts();
        $result = $entity->getUserList();//duowei shuzu

        $html = '';
        foreach ($result as $user) {
            $html .= <<<TR
<tr>
<form action="AdminUserTestBoundary.php?act=del" method="POST">
<input type="hidden" name="uid" value={$user['uid']}>
<td>{$user['uname']}</td>
<td>{$user['uemail']}</td>
<td>{$user['uphone']}</td>
<td>{$user['address']}</td>
<td><button class="btn btn-primary">DEL</button><button class="btn btn-success">EDIT</button></td>
</form>

</tr>
TR;
        }

        return $html;
    }

    public function deleteUser($uid)
    {
    }
}
