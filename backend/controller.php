<?php
include 'model.php';

class Controller{

    private $model;
    public function __construct(){
        $this->model = new Model();
    }
    // contact form
    public function insert_contact_controller($data){

        $insert_array = array(
            "first_name" => ucwords(strtolower(strip_tags($data['firstName']))),
            "last_name" => ucwords(strtolower(strip_tags($data['lastName']))),
            "email" => strtolower(strip_tags($data['email'])),
            "phone_number" => strip_tags($data['phoneNumber']),
            "city" => strtoupper(strip_tags($data['city'])),
            "postal_code" => strtoupper(strip_tags($data['postalCode'])),
            "unit_size" => strip_tags($data['unitSize']),
            "contact_source" => ucwords(strtolower(strip_tags($data['contactSource']))),
            "price_range" => strip_tags($data['priceRange']),
            "is_broker" => strip_tags($data['isBroker']),
            "anti_spam_check" => strip_tags($data['antiSpamCheck']),
        ); 
        $insert_array_constraint = array(
            "first_name" => 's',
            "last_name" => 's',
            "email" => 's',
            "phone_number" => 's',
            "city" => 's',
            "postal_code" => 's',
            "unit_size" => 'i',
            "contact_source" => 's',
            "price_range" => 'i',
            "is_broker" => 's',
            "anti_spam_check" => 's'
        );        
        $insert_resp = $this->model->insert($insert_array, $insert_array_constraint, 'contact');
        return $insert_resp;

    }
    // admin login form
    public function login_controller($data){

        if(isset($data['email']) && isset($data['password'])){

            if(!empty($data['email']) && !empty($data['password'])){

                if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i", $data['email'])){

                    $login_credentials = array(
                        "email" => strip_tags($data['email']),
                        "password" => md5(strip_tags($data['password']))
                    );         
                    $login_response = $this->model->select($login_credentials, 'user_login');
                    $result = $login_response !== 0 ? $login_response : 0;
                    return $result;

                } else {

                    return 0;

                }

            }

        }

    }
    // select record for edit form - admin side
    public function select_record_by_id_controller($data, $action){

        if(isset($data['id'])){

            $id = (int)$data['id'];

            if(!empty($id) && is_int($id)){
                $where_array = array(
                    "id" => $id,
                );     
            if($action === "edit"){

                $tablename = "add_content";

            }else if($action === "online-tool"){

                $tablename = "header_footer_section";

            }
            $select_record = $this->model->select($where_array, $tablename);
            return $select_record;

            }

        }

    }
    // edit form - admin side
    public function edit_online_tool_controller($data){

        if(isset($data['header_content']) && isset($data['footer_content'])){

                $edit_data = array(
                    "header_content" => htmlentities($data['header_content'], ENT_QUOTES),
                    "footer_content" => htmlentities($data['footer_content'], ENT_QUOTES)
                );
                $update_id = $data['id'];       
                $edit_response = $this->model->edit($edit_data, $update_id,  'header_footer_section');
                return $edit_response;

        }

    }
    // contact list - admin side
    public function contact_list_controller(){

        $list = $this->model->list('contact');
        return $list;
    }
     // online list - admin side
     public function online_tool_list_controller(){

        $list = $this->model->list('header_footer_section');
        return $list;
    }
    // delete record - admin side
    public function delete_controller($data){

        if(isset($data['id'])){

            $id = (int)$data['id'];

            if(!empty($id) && is_int($id)){

                $where_array = array(
                    "id" => $id,
                );     
            $delete_record = $this->model->delete($where_array, 'contact');
            return $delete_record;

            }

        }

    }
   
}

?>