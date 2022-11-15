<?php

class Model{
     
    use Database;

    protected $table = 'users';
    protected $limit = 10;
    protected $offset = 0;



    public function __construct()
    {
        
    }

    // public function test(){
    //     $query ="SELECT * FROM users";

        
    //     $result=$this->query($query);
    //     echo 'hello';
    //     print_r($result);

    // }

    //get results from specific record
    public function where($data, $data_not=[]){
        $keys = array_keys($data); //function to seperate keys from array
        $keys_not = array_keys($data_not);
        $query ="SELECT * FROM $this->table WHERE ";
        foreach($keys  as $key){
            $query .= $key."= :".$key." && ";
        }
        foreach ($keys_not as $key => $value) {
            $query .= $key."!= :".$key." && ";
        }

        $query = substr($query,0,-4);

        $query .= " LIMIT $this->limit OFFSET $this->offset";

        $data = array_merge($data,$data_not);
        return $this->query($query,$data);

    }

    public function first($data, $data_not=[]){
        $keys = array_keys($data); //function to seperate keys from array
        $keys_not = array_keys($data_not);
        $query ="SELECT * FROM $this->table WHERE ";
        foreach($keys  as $key){
            $query .= $key."= :".$key." && ";
        }
        foreach ($keys_not as $key => $value) {
            $query .= $key."!= :".$key." && ";
        }

        $query = substr($query,0,-4);

        $query .= " LIMIT $this->limit OFFSET $this->offset";

        $data = array_merge($data,$data_not);
        $result = $this->query($query,$data);
        
        if($result){
            return $result[0];
        }
        return false;

    }

    public function insert($data){
        $keys = array_keys($data);
        
        $query = "INSERT INTO $this->table (".implode(",",$keys).") VALUES (:".implode(",:",$keys).")";
 
        // $query ="INSERT INTO $this->table SET ";
        
        // foreach($keys as $key){
        //     $query .= $key." = :".$key.", ";
        // }
        // $query = substr($query,0,-2);

        $this->query($query,$data);

        return false;
    }

    public function update($id,$data,$id_col='id'){
        $keys = array_keys($data);
        
        $arr[$id_col]=$id;
        $query = "UPDATE $this->table SET ";
        foreach($keys as $key){
            $query .= $key." = :".$key.", ";
        }
        $query = substr($query,0,-2);
        $query .= " WHERE $id_col = :$id_col";

        //print_r($query);

        $data = array_merge($data,$arr);
        //print_r($data);
        $this->query($query,$data);


        return false;
    }

    public function delete($id,$id_col='id'){
        
        $data[$id_col]=$id;
        $query = "DELETE FROM $this->table WHERE $id_col = :$id_col";

        $this->query($query,$data);

        return false;
    }

    
}





















// public function create($table,$data){
    //     $sql = "INSERT INTO $table SET ";
    //     foreach($data as $key =>$value){
    //         $sql .= "$key = '$value', ";
    //     }
    //     $sql = substr($sql,0,-2);
    //     $result = $this->queryDb($sql);
    //     return $result;
    // }

    // public function read($table,$where){//where should be a string
    //     $sql = "SELECT * FROM $table ";
    //     if($where != null){
    //         $sql .= "WHERE $where";
    //     }
    //     $result=$this->queryDb($sql);
    //     return $result;
    // }

    // public function update($table,$data,$where){
    //     $sql = "UPDATE $table SET ";
    //     foreach($data as $key =>$value){
    //         $sql .= "$key = '$value', ";
    //     }
    //     $sql = substr($sql,0,-2);
    //     $sql .=" WHERE $where"; 
    //     $result = $this->queryDb($sql);
    //     return $result;
    // }

    // public function delete($table,$where){
    //     $sql = "DELETE FROM $table WHERE $where";
    //     $result = $this->queryDb($sql);
    //     return $result;
    // }