<?php

abstract class Controller {
    //protected $pathName;
    protected $template;

    public function __construct(){
        //$this->pathName = strtolower($pathName);
    }

    public function GetPathName(){
        return $this->pathName;
    }

    public static function ValidateControllersPath($controllers){
        if(isset($_GET["page"])){
            $paths = explode("/", strtolower($_GET["page"]));
            if(isset($paths[0])){
                if(isset($controllers[$paths[0]])){
                    $controllers[$paths[0]]->ShowContent($paths);
                }
            } else {
                $controllers[HomeController::ROUTE]->ShowContent($paths);
            }

        } else {
            $controllers[HomeController::ROUTE]->ShowContent(null);

        }


    }

    abstract public function ShowContent($paths);

    abstract public function Index($paths);
  

}