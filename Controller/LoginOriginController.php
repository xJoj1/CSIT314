<?php

require_once APP_ROOT . '/entity/UserAccounts.php';
class LoginOriginController
{

    //check user's type, return the corresponding one
    public function loginCheck($userName, $password){


        //first check if user name and password are empty, den go ahead to login fucntion
        if ($this->verifyLogin($userName, $password)){
            $checkAccount = new UserAccounts();

            $loginInfo = $checkAccount-> getUserInfoSession($userName, $password);


            if (!empty($loginInfo)){
                $_SESSION['loginStatus'] = true;


                $_SESSION['profile_type'] = $loginInfo[0]['profile_type'];
                $_SESSION['loginStatus'] = true;





                switch ($_SESSION['profile_type']) {
                    case 'Buyer':
                        echo $_SESSION['profile_type'];
//                    header('location: testPage.php');
                        break;
                    case 'Agent':
                        echo $_SESSION['profile_type'];
//                    header('location: testPage.php');
                        break;

                    case 'Seller':
                        echo $_SESSION['profile_type'];
//                    header('location: testPage.php');
                        break;
                    case 'Admin':
//                    echo $_SESSION['profile_type'];
                        header('location: /CSIT314-main/Boundary/SysAdmin/adminDashboardBoundary.php' );
                        break;
                    default:
                        break;

                }
            }else{
                echo "<script type='text/javascript'>
                alert('Invalid userName or password');
              </script>";
                return false;
            }

            //跳转

        }else{
            return false;
        }

    }

    //verify account if is empty
    public function verifyLogin($userName, $password){
        if (empty($userName) || empty($password)) {
            // check if userName and password is empty
            return false;
        }
        return true;
    }

}
