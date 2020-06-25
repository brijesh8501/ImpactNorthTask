<?php
include '../backend/controller.php';

$controller = new Controller();

if(isset($_REQUEST['sign-in'])){

    // signin details
   // check signin form csrf token
   if(!empty( $_REQUEST['csrf_token'] )){

       // check csrf token is valid or not
       if( checkToken( $_REQUEST['csrf_token'], 'signin' ) ) {

           $login_resp = $controller->login_controller($_REQUEST);
           
           if($login_resp !== 0){

               $_SESSION['name'] = $login_resp->name;
               $_SESSION['email'] = $login_resp->email;

                   if(!empty($_REQUEST["remember"])) {

                       setcookie ("member_login", $_REQUEST["email"], time()+ (10 * 365 * 24 * 60 * 60));

                   } else {
                       if(isset($_COOKIE["member_login"])) {

                           setcookie ("member_login", "");

                       }
                   }

                   header("Location: home.php");
           }else{

               $error_msg = "Wrong username or password.";

           }

       }else{

            $error_msg = "Something went wrong, try again!";

       }

   }
}
?>