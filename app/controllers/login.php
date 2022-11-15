<?php

class Login extends Controller{
    public function index(){
        $this->view('login/login');
    }

    public function userLogin(){
        $userName = $_POST['userName'];
        $password = $_POST['password'];

        $user = new User;
        
    }
}