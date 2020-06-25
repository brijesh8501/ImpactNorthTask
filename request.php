<?php
include 'backend/controller.php';

$controller = new Controller();
// check action
if(isset($_REQUEST['action'])){
    $action = $_REQUEST['action'];
	
    // insert contact details
    // check contact form csrf token
    if($action === 'save'){

        // check inputs exists and not empty - dynamically
        $resultCheckInputExists = checkInputsExists($_REQUEST);
        if($resultCheckInputExists === 1){

            // requirement is less that's why no resuable function is made
            if(preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i", $_REQUEST['email']) && preg_match("/^\(?([0-9]{3})\)[-.]([0-9]{3})[-.]([0-9]{4})$/i", $_REQUEST['phoneNumber']) &&
                preg_match("/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/", $_REQUEST['postalCode']) ){

                $insert_msg = $controller->insert_contact_controller($_REQUEST);
                echo $insert_msg;
            }else{
                echo 0;
            }
        }else{
            echo $resultCheckInputExists;
        }
    }

}
function checkInputsExists($data){

    $index = 0;
          
    $variableExists = "";
    $variableIsEmpty = "";
    foreach($data as $key=>$val){
       
        if(sizeof($data) - 1 === $index){

            $variableExists .= " isset(\$data['$key'])";
            $variableIsEmpty .= " !empty(\$data['$key'])";

        }else{

            $variableExists .= " isset(\$data['$key']) &&";
            $variableIsEmpty .= " !empty(\$data['$key']) &&";

        }
        $index++; 

    }
    $passVariableExists = trim($variableExists);
    $passVariableEmpty = trim($variableIsEmpty);
    
    eval("if($passVariableExists){
        if($passVariableEmpty){
            \$returnMsg = 1;
        }else{
            \$returnMsg = 0;
        }
    }else{
        \$returnMsg = 0;
    }");
    return $returnMsg;
}

?>