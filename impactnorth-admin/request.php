<?php
include '../backend/controller.php';

$controller = new Controller();

if(isset($_REQUEST['action'])){

    $action = $_REQUEST['action'];
    if($action === "edit" || $action === "online-tool"){

        $select_record_for_edit_resp = $controller->select_record_by_id_controller($_REQUEST, $action);

    }else if($action === "delete"){

        $delete_resp = $controller->delete_controller($_REQUEST);
        echo $delete_resp;

    }

}
if(isset($_REQUEST['edit'])){

    // edit details
    // check edit form csrf token
    if(!empty( $_REQUEST['csrf_token'] )){

        // check csrf token is valid or not
        if( checkToken( $_REQUEST['csrf_token'], 'edit' ) ) {

            $edit_resp = $controller->edit_controller($_REQUEST);
            if($edit_resp === 1){

                echo '<script>alert("Successfully made the changes!")</script>';
                echo '<script>window.location.href="'.$_SERVER['REQUEST_URI'].'"</script>';

            }else{

                echo '<script>alert("Something went wrong, try again!")</script>';

            }

        }

    }

}
if(isset($_REQUEST['edit_online_tool'])){

    // edit details
    // check edit form csrf token
    if(!empty( $_REQUEST['csrf_token'] )){

        // check csrf token is valid or not
        if( checkToken( $_REQUEST['csrf_token'], 'onlineTool' ) ) {

            $edit_resp = $controller->edit_online_tool_controller($_REQUEST);
            if($edit_resp === 1){

                echo '<script>alert("Successfully made the changes!")</script>';
                echo '<script>window.location.href="'.$_SERVER['REQUEST_URI'].'"</script>';

            }else{

                echo '<script>alert("Something went wrong, try again!")</script>';

            }

        }

    }

}
?>