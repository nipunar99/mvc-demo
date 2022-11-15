<?php

//core class of the Controllers
class Controller{
    public function __construct()
    {
       
    }

    public function model($model){
        //echo 'hello';
        require_once (__DIR__.'/../models/'.$model.'.php');
        return new $model();
    }

    public function view($view='',$data=[]){
        require_once(__DIR__.'/../views/'.$view.'.php');
    }
}


//There shold be a method to load a requested model into the controller
//Thats the firstthing we need to do