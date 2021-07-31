<?php


class AboutController extends Controller {
    public const ROUTE = "acercade";

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

    public function Index($paths){

        echo "<div class='container mt-4'><h1>Soy la pagina de Acerca de</h1></div>";

    }


}