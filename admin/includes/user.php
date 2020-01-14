<?php 



class User {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function find_all_users() {
    // global $database;

    // $result_set = $database->query("SELECT * FROM users");

    // return $result_set;

    return self::find_this_query("SELECT * FROM users", 0);
    }

    
        
    public static function find_user_by_id($id) {
    global $database;
    //static $id;

    // $stmt = $database->getDb()->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
    $the_result_array = self::find_this_query("SELECT * FROM users WHERE id = :id LIMIT 1", $id);
    //$the_result_array->execute([':id' => $id]);

    
    
    //Video 48
   // $found_user  = $stmt->fetch(PDO::FETCH_ASSOC);
    //return $the_result_array;
    return !empty($the_result_array) ? array_shift($the_result_array) : false;
    
    //Video 48
    // if(!empty($the_result_array)){
    //    $first_item =  array_shift($the_result_array);
    //    return $first_item;
    // } else {
    //     return false;
    // }
    

    //$found_user = $stmt->fetch(PDO::FETCH_ASSOC);
                
    return $found_user;



    }
    public static function find_this_query($sql, $num){
        global $database;
        if($num == 0){
            $stmt = $database->getDb()->prepare($sql);
            $stmt->execute();
    
            $the_object_array = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $the_object_array[] = self::instantation($row);
            }
            
            return $the_object_array;
        } else {
            if($num =='userpass'){
                $stmt = $database->getDb()->prepare($sql);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
                $stmt->execute();
        
                $the_object_array = array();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $the_object_array[] = self::instantation($row);
                }
                
                return $the_object_array;
            }
            $stmt = $database->getDb()->prepare($sql);
            $stmt->bindParam(':id', $num);
            $stmt->execute();
    
            $the_object_array = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $the_object_array[] = self::instantation($row);
            }
            
            return $the_object_array;
        }
       
        //return $stmt;
    }
    public static function verify_user($username, $password){
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);


        $sql = "SELECT * FROM users WHERE";
        $sql .= "username = :username";
        $sql .= "password = :password";
        $sql .= "LIMIT 1";

  
        $the_result_array = self::find_this_query($sql, 'userpass');
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }

    public static function instantation($the_record){
        
        $the_object = new self;

        // $the_object->uid        = $stmt['id'];
        // $the_object->username   = $stmt['username'];
        // $the_object->password   = $stmt['password'];
        // $the_object->first_name = $stmt['first_name'];
        // $the_object->last_name  = $stmt['last_name'];
        foreach($the_record as $the_attribute => $value){
            if($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute = $value;
            }
        }
        return $the_object;
    }

    private function has_the_attribute($the_attribute){
        $object_properties = get_object_vars($this);

       return array_key_exists($the_attribute, $object_properties);

    }


}



?>