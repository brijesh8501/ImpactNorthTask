<?php
    class Model{

        private $server = 'localhost';
        private $username = 'root';
        private $password;
        private $db = 'impactnorth_database';
        private $conn;

        public function __construct(){
            
            try{

                $this->conn = new mysqli( $this->server, $this->username, $this->password, $this->db);

            } catch (Exception $e){

                echo "connection failed".$e->getMessage();

            }

        }

        // insert
        public function insert($insert_array, $insert_array_constraint, $tablename){

            $insert_key = array_keys($insert_array);
            $insert_val = array_values($insert_array);

            $insert_constraint_val = array_values($insert_array_constraint);
            
            
            $insert_query = "INSERT INTO $tablename (" . implode(', ', $insert_key) . ") ". "VALUES (" . substr(str_repeat('?,', count($insert_val)), 0, -1) . ")";
            $stmt = $this->conn->prepare($insert_query);
            $types = implode("",$insert_constraint_val);
            $stmt->bind_param($types, ...$insert_val);
            $stmt->execute();
            if($stmt){

                return "Submitted successfully";

            }else{

                return 0;

            }
            $stmt->close();
            
        }
        
        // select
        public function select($where_array, $tablename){

            $select_key = array_keys($where_array);
            $select_val = array_values($where_array);


            $index = 0;
          
            $list_query = "SELECT * from $tablename where ";

            foreach($where_array as $key=>$val){

                if(sizeof($where_array) - 1 === $index){

                    $list_query .= "$key = ?";

                }else{

                    $list_query .= "$key = ? and ";

                }
                $index++; 

            }
         
            $stmt = $this->conn->prepare($list_query);
            $types = str_repeat('s', count($select_key));

            $stmt->bind_param($types, ...$select_val);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_object();

            if($result->num_rows === 0){

                return 0;

            }else{

                $stmt->close();
                return $data;

            }

        }

        //edit
        public function edit($update_array, $update_id, $tablename){

            $update_key = array_keys($update_array);
            $update_val = array_values($update_array);
            $bind_param = array_merge($update_val, array($update_id));

            $update_query = "UPDATE $tablename SET ";
            $index = 0;
            foreach($update_array as $key=>$val){

                if(sizeof($update_array) - 1 === $index){

                    $update_query .= "$key = ?";

                }else{

                    $update_query .= "$key = ?, ";

                }
                $index++; 

            }
            $update_query .= " where id = ?";
            $stmt = $this->conn->prepare($update_query);
            $types = str_repeat('s', count($update_val));
            $types .= "i";
            $stmt->bind_param($types, ...$bind_param);
            $stmt->execute();
            if($stmt){

                return 1;

            }else{

                $stmt->close();
                return 0;

            }

        }

        //list
        public function list($tablename){
         
            $list_query = "SELECT * from $tablename";
            $query_exec = $this->conn->query($list_query);
            
            if($query_exec->num_rows === 0){

                return 0;

            }else{

                $list_data = $query_exec->fetch_all(MYSQLI_ASSOC);
                $query_exec->free_result();     
                return $list_data;

            }
        }

        // delete
        public function delete($where_array, $tablename){

            $delete_query = "DELETE from $tablename where id = ?";
            $stmt = $this->conn->prepare($delete_query);

            $stmt->bind_param('i', $where_array['id']);
            $stmt->execute();
            if($stmt){

                return 1;

            }else{

                return 0;

            }  
            $stmt->close();

        }
        public function __destruct() {

            $this->conn->close();

        }

    }
?>