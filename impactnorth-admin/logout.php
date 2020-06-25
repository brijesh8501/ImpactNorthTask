<?php session_start();
include '../form_csrf/csrf.php';

if(isset($_REQUEST['ounce'])){

    if(!empty( $_REQUEST['ounce'])){
        
        // check csrf token is valid or not
        if( checkToken( $_REQUEST['ounce'], 'logout' ) ) {

            unset($_SESSION['name']);
            unset($_SESSION['email']);
            header("location: impactnorth-login.php");

        }else{

            redirectWithError();

        }

    }else{

        redirectWithError();

    }

}else{

    redirectWithError();

}
function redirectWithError(){

    return header("location: home.php?error=logout");

}
?>