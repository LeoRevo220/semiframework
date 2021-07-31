<?php
require_once "controllers/controller.php";
require_once "controllers/home.controller.php";
require_once "controllers/about.controller.php";
require_once "controllers/users.controller.php";




class Template {
    private $controllers;
    //It must come from the DB
    public const ROOT_PATH = "/semiframework/";
    public function __construct(){
        $this->InitializeControllers();
    }
    public function ShowTemplate(){
        include "views/main-template.php";
    }
    public function InitializeControllers(){
        $this->controllers = array(HomeController::ROUTE => new HomeController(),
                                    AboutController::ROUTE=> new AboutController(),
                                    UsersController::ROUTE=> new UsersController());

    }
    //Determinar que controlador se va a usar para cada pagina 
    public function DeterminePage(){
        Controller::ValidateControllersPath($this->controllers);
    }

   

    public static function Route($controller, $action){
        $route = self::ROOT_PATH;
        if($action != null)
            $route = self::ROOT_PATH.$controller."/".$action;
        else
            $route = self::ROOT_PATH.$controller;
        return $route;
    }

    
   
}


