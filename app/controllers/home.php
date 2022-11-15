<?php

class Home extends Controller{
    public function index($name='',$other=''){
        // $user = $this->model("User");
        // $user->userName = $name.' '.$other;
        // echo $user->userName;

        // $this->view('login/login',['name'=>$user->userName]);

        

        $model = new Model;
        
        //$arr['userId']='2';
        $arr['password'] ='1234aabbccdd';
        //$arr['role'] ='technician';  
        //echo 'hello';
        $model->update(1,$arr,"userId");
        //print_r($result);

        // if(!$_SESSION['signedin']){
        //     $this->view('home/index');
        // }


    }

  
}




















// echo "hello";
        // $db = new Database;
        // $result=($db->queryDb("SELECT * FROM users WHERE userId='1'"));
        // $rows = $result->fetch_assoc();
        // // while($row = $result->fetch_row()) {
        // //     $rows[] = $row;
        // // }
        // print_r ($rows);