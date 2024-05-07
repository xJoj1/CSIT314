<?php
require_once APP_ROOT . '/entity/User.php';

class viewUserController
{

    public function displayUserInfo($userID)
    {
        $user = new User();
        $result = $user->getUserByID($userID);
        $html='';
        $html.=<<<HTML
      <!-- Table content -->
            <tr>
                <th>Name:</th>
                <td>{$result[0]['username']}</td> <!-- db.value here-->
            </tr>
            <tr>
                <th>User ID:</th>
                <td>{$result[0]['user_id']}</td> <!-- db.value here-->
            </tr>
            <tr>
                <th>Birthdate:</th>
                <td>{$result[0]['birthdate']}</td> <!-- db.value here-->
            </tr>
            <tr>
                <th>Address:</th>
                <td>{$result[0]['address']}</td> <!-- db.value here-->
            </tr>
            <tr>
                <th>Contact:</th>
                <td>{$result[0]['contact']}</td> <!-- db.value here-->
            </tr>
            <tr>
                <th>Profile</th>
                <td>{$result[0]['profile_type']}</td> <!-- db.value here-->
            </tr>
HTML;

        return $html;
    }
}