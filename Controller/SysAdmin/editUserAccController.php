<?php
require_once APP_ROOT . '/entity/User.php';


class editUserAccController
{
    public function editUserInfo($userID,$data = [])
    {
//        dump($_POST);
        $user = new User();
        $user->editUserInfo($userID,$data);
    }


    public function displayEditUser($userID)
    {
        $entity = new User();
        $result = $entity->getUserByID($userID);
//        dump($result);

        $buyerSelected = $sellerSelected = $agentSelected = '';

        $userProfileType = strtolower($result[0]['profile_type']);

        if ($userProfileType == 'buyer') {
            $buyerSelected = 'selected';
        }else if ($userProfileType == 'seller'){
            $sellerSelected = 'selected';
        }else if ($userProfileType == 'REagent'){
            $agentSelected = 'selected';
        }

        $html = '';
        $html.=<<<DIV
<div class="container mt-5">
  <div class="create-container">
      <a href="userAccountsBoundary.php" class="back-arrow">‹</a>
      <h2>Edit User Account</h2>
      <form id="userForm" onsubmit="return validateForm()" method="post"> 
          <div class="form-group">
              <div class="row">
                  <div class="col-3">
                      <label for="name">Name:</label>
                  </div>
                  <div class="col">
                      <input type="text" id="name" name="username" value={$result[0]['username']}>
                  </div>
              </div>
              <div class="row">
                  <div class="col-3">
                      <label></label>
                  </div>
                  <div class="col">
                      <div class="col" id="nameError" class="error-message"></div>
                  </div>
              </div>
          </div>

          <div class="form-group">
              <div class="row">
                  <div class="col-3">
                      <label for="user-id">User ID:</label>
                  </div>
                  <div class="col">
                      <input type="text" id="user-id" name="user_id" value={$result[0]['user_id']}>
                  </div>
              </div>
              <div class="row">
                  <div class="col-3">
                      <label></label>
                  </div>
                  <div class="col">
                      <div class="col" id="userIdError" class="error-message"></div>
                  </div>
              </div>
          </div>

          <div class="form-group">
              <div class="row">
                  <div class="col-3">
                      <label for="password">Password:</label>
                  </div>
                  <div class="col">
                      <input type="password" id="password" name="password" value={$result[0]['password']}>
                  </div>
              </div>
              <div class="row">
                  <div class="col-3">
                      <label></label>
                  </div>
                  <div class="col">
                      <div class="col" id="passwordError" class="error-message"></div>
                  </div>
              </div>
          </div>

          <div class="form-group">
              <div class="row">
                  <div class="col-3">
                      <label for="birthdate">Birthdate:</label>
                  </div>
                  <div class="col calendarI row">
                      <input type="date" class = "col" id="birthdate" name="birthdate" value="2000-12-12">
                  </div>
              </div>
              <div class="row">
                  <div class="col-3">
                      <label></label>
                  </div>
                  <div class="col">
                      <div class="col" id="birthdateError" class="error-message"></div>
                  </div>
              </div>
          </div>

          <div class="form-group">
              <div class="row">
                  <div class="col-3">
                      <label for="address">Address:</label>
                  </div>
                  <div class="col">
                      <input type="text" id="address" name="address" value={$result[0]['address']}>
                  </div>
              </div>
              <div class="row">
                  <div class="col-3">
                      <label></label>
                  </div>
                  <div class="col">
                      <div class="col" id="addressError" class="error-message"></div>
                  </div>
              </div>
          </div>

          <div class="form-group">
              <div class="row">
                  <div class="col-3">
                      <label for="contact">Contact:</label>
                  </div>
                  <div class="col">
                      <input type="text" id="contact" name="contact" value={$result[0]['contact']}>
                  </div>
              </div>
              <div class="row">
                  <div class="col-3">
                      <label></label>
                  </div>
                  <div class="col">
                      <div class="col" id="contactError" class="error-message"></div>
                  </div>
              </div>
          </div>

          <div class="form-group">
              <div class="row">
                  <div class="col-3">
                      <label for="profile-type">Profile Type:</label>
                  </div>
                  <div class="col">
                      <select id="profile-type" name="profile_type">
                        <option value="buyer" {$buyerSelected}>Buyer</option>
                        <option value="seller" {$sellerSelected}>Seller</option>
                        <option value="REagent"{$agentSelected}>Real Estate Agent</option>
                      </select>
                  </div>
              </div>
          </div>

          <div class="form-group mt-5">
              <div class="row">
                  <div class="col-3 m-auto">
                      <button type="submit" class="btn-primary btn-block">Confirm</button>
                  </div>
              </div>
          </div>
      </form>
  </div>
</div>
DIV;

        return $html;
    }


}