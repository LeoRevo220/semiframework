<?php

require_once "controllers/template.controller.php";


class HomeController extends Controller {
    // CONTROLLER ROUTE
    public const ROUTE = "inicio";

    //ACTIONS ROUTE
    public const INDEX = "index";


    public $actions;
    
    public function __construct(){
        //parent::__construct($pathName);
        $this->actions = array(self::INDEX => new Action("Index", null));
    }

    public function ShowContent($paths) {
        //Determine wich method call
       Action::ValidateActionsPath($paths, $this);

    }


    public function Index($paths) {
        $nombre = "Felix";
        
        include "views/home/index.php";
    }

   


}