<?php

//$db = DBTYPE.':hostname'.DBHOST.';dbname='.DBNAME;
//$con = new PDO($db,DBUSER,DBPASS);

//print_r($con);

trait Database{
    // public $mysqli;

    // public function __construct(){
    //     $this->db_connect();
    // }

    // private function db_connect(){
    //     $this->mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);
    //     return $this->mysqli;
    // }

    // public function numRows($result){
    //     return $result->num_rows;
    // }

    // public function queryDb($sql){
    //     $result=$this->mysqli->query($sql);
    //     return $result;
    // }

    private function connect(){
        $string = "mysql:hostname=".DBHOST.";dbname=".DBNAME;
        $con = new PDO($string,DBUSER,DBPASS); 
        return $con;
    }

    public function query($query, $data = []){
        $con = $this->connect();
        $stmt = $con->prepare($query);
        
        $check =$stmt->execute($data);
        if($check){
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)){
                return $result;
            }
        }
        return false;  
    }

    public function get_row($query, $data = []){
        $con = $this->connect();
        $stmt = $con->prepare($query);

        $check =$stmt->execute($data);
        if($check){
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)){
                return $result[0];
            }
        }
        return false;  
    }


}
