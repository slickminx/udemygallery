<?php 

require_once("new_config.php");

class Database {



    public $dbc;
    
    function __construct() {

        $this->open_db_connection();
    }


    public function open_db_connection() {
        try {

        $this->dbc = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
            // set the PDO error mode to exception
        $this->dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //return $this->dbc;

        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }

    }
    public function query($sql){
        try {
            $result = $this->dbc->prepare($sql);
            $result->execute();
            return $result;
        }catch(PDOException $e){
            echo "Query failed: " . $e->getMessage();
        }
    }
    // private function confirm_query($result) {
    //     if(!$result){
    //         die("Query Failed");
    //     }

    // }
    public function escape_string($string) {
       $escaped_string = htmlspecialchars(trim($string));
       return $escaped_string;
    }
    public function the_insert_id() {
        $this->dbc->lastInsertID();
    }
    public function getDb() {
        if ($this->dbc instanceof PDO) {
             return $this->dbc;
        }
    }

}

$database = new Database();
//$database->open_db_connection();




 

?>