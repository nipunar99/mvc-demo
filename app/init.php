<?php

spl_autoload_register(function($classname){
    echo $filename = __DIR__.'/../models/'.ucfirst($classname).'.php';
});

require_once (__DIR__.'/core/App.php');
require_once (__DIR__.'/core/Controller.php');
require_once (__DIR__.'/core/config.php');
require_once (__DIR__.'/core/Database.php');
require_once (__DIR__.'/core/Model.php');





?>
