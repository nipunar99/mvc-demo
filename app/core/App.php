<?php

//system's logic (Not the business one) is here: Responsible for all the routings
class App{

    //Set up default values
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];
    
    public function __construct(){
        //echo 'hello from app';
        $url = $this->parseUrl();
        //print_r($url);
        
        //checking whether file exists
        if($bool=file_exists('../app/controllers/'.$url[0].'.php')){
            //echo 'hello2';
            $this->controller=$url[0]; //if exists controlle is set to first element of array(url)
            //echo $url[0];
            unset($url[0]); //unsetting theurl[this is optional][can do it wihout unsetting]
            
        }
        
        //echo $url[0];
        require_once (__DIR__.'/../controllers/'.$this->controller.'.php');
        //echo $this->controller;

        //Intiating a requested controller (so we can call its methods using other url params)
        $this->controller = new $this->controller;

        //var_dump($this->controller);

        //Check is a specific method is called
        //it its called replace the method variable
        //and calls the variable
        echo $url[1];
        if(isset($url[1])){
            if($bool=method_exists($this->controller,$url[1])){
                
                $this->method = $url[1];
                
                unset($url[1]);
            }
        }

        //reinitiating the parameter array if parameters exist in array
        $this->params = $url ? array_values($url) : [];

        //call a function
        call_user_func_array([$this->controller,$this->method],$this->params);
        echo "HHHHH";



    }

    //reads the url and parse it into a array
    public function parseUrl(){
        if(isset($_GET['url'])){
            return $url = explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
        }
    }
}