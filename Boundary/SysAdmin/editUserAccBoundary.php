<?php
require_once '../app_config.php';
require_once APP_ROOT . '/Controller/SysAdmin/editUserAccController.php';
require_once 'navbar.php';
session_start();

$userID = isset($_GET['uid']) ? $_GET['uid'] : 0;
function displayEditUser($userID){
    $editUser = new EditUserAccController();
    return $editUser->displayEditUser($userID);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $editUserAcc = new EditUserAccController();
    $editUserAcc->editUserInfo($userID,$_POST);
    header('location: userAccountsBoundary.php');
}

?>


<?php
$pageTitle = "Admin Edit/Modify";
include APP_ROOT . "/Boundary/header.php";
?>

<!--start of nav bar-->
<?php
displayNavBar('userAccounts');
?>


<!-- Container for Edit User Account -->
<?php
echo displayEditUser($userID);
?>

<script>
  function validateForm() {
      var name = document.getElementById("name").value;
      var userId = document.getElementById("user-id").value;
      var password = document.getElementById("password").value;
      var birthdate = document.getElementById("birthdate").value;
      var address = document.getElementById("address").value;
      var contact = document.getElementById("contact").value;

      var isValid = true;

      if (name === "") {
          document.getElementById("nameError").innerHTML = "Please enter your name";
          isValid = false;
      } else {
          document.getElementById("nameError").innerHTML = "";
      }

      if (userId === "") {
          document.getElementById("userIdError").innerHTML = "Please enter a user ID";
          isValid = false;
      } else {
          document.getElementById("userIdError").innerHTML = "";
      }

      if (password === "") {
          document.getElementById("passwordError").innerHTML = "Please enter a password";
          isValid = false;
      } else {
          document.getElementById("passwordError").innerHTML = "";
      }

      if (birthdate === "") {
          document.getElementById("birthdateError").innerHTML = "Please enter your birthdate";
          isValid = false;
      } else {
          document.getElementById("birthdateError").innerHTML = "";
      }

      if (address === "") {
          document.getElementById("addressError").innerHTML = "Please enter your address";
          isValid = false;
      } else {
          document.getElementById("addressError").innerHTML = "";
      }

              if (contact === "") {
          document.getElementById("contactError").innerHTML = "Please enter your contact number";
          isValid = false;
      } else if (contact.length !== 8) { // Check if contact is exactly 8 digits long
          document.getElementById("contactError").innerHTML = "Contact number must be 8 digits long";
          isValid = false;
      } else {
          document.getElementById("contactError").innerHTML = "";
      }
      return isValid;
  }
</script>

<?php
$pageTitle = "Admin edit/Modify";
include APP_ROOT . "/Boundary/footer.php";
?>
