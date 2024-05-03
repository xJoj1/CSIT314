<?php

require_once APP_ROOT . '/entity/UserAccounts.php';
class LoginController
{

    //check user's type, return the corresponding one
    public function loginCheck($userName, $password){


        //first check if user name and password are empty, den go ahead to login fucntion
        if ($this->verifyLogin($userName, $password)){
            $checkAccount = new UserAccounts();
            $checkAccount-> setUserInfoSession($userName, $password);



            //跳转
            switch ($_SESSION['utype']) {
                case 'buyer':
                    echo $_SESSION['utype'];
//                    header('location: testPage.php');
                    break;
                case 'reAgent':
                    echo $_SESSION['utype'];
//                    header('location: testPage.php');
                    break;

                case 'seller':
                    echo $_SESSION['utype'];
//                    header('location: testPage.php');
                    break;
                case 'admin':
//                    echo $_SESSION['utype'];
                    header('location: /csit314-group/boundary/sysAdmin/adminDashboardBoundary.php' );
                    break;
                default:
                    break;

            }
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
