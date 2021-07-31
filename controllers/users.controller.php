<?php

require_once "controllers/template.controller.php";
require_once "models/UserModel.php";
require_once "helpers/action.php";

class UsersController extends Controller {
    //CONTROLLER ROUTE
    public const ROUTE = "usuarios";

    //ACTIONS ROUTING
    public const SHOW_ALL_USERS = "mostrar";
    public const EDIT_USER = "editarusuario";
    public const INDEX = "index";
    public const DELETE = "deleteuser";


    public $actions;

    public function __construct(){
        //parent::__construct($pathName);

        $this->actions = array(self::SHOW_ALL_USERS=> new Action("ShowAllUsers", null),
                                self::EDIT_USER => new Action("EditUser", "EditUserPost"),
                                self::INDEX => new Action("Index", "IndexPost"),
                                self::DELETE => new Action(null, "DeleteUser"));
    }

    public function ShowContent($paths) {
        //Determine wich method call TO A SPECIFIC ACTION SENDED IT IN THE URL
        Action::ValidateActionsPath($paths, $this);
    }


    public function Index($paths){       

        $test = 20;
       include "views/users/index.php";
    }

    
    public function IndexPost($paths) {
        
        $user = new UserModel();
        $user->setName($_POST["name"]);
        $user->setLastName($_POST["lastname"]);
        $user->setEmail($_POST["email"]);


        $result = $user->InsertUser($user);


        
        $args = array("result" => $result);

        include "views/users/index.php";            
       
    }

    public function ShowAllUsers($paths){
        $allUsers = UserModel::GetAllUsers();

        include "views/users/showallusers.php";
    }

    public function EditUser($paths){

        if(isset($paths[2])){
            
            $user = UserModel::GetUserById($paths[2]);


            include "views/users/edituser.php";

        } else{
            include "views/error.php";
        }

    }

    public function EditUserPost($paths){
        
        $idToEdit = $_POST["id"];

        $user = UserModel::GetUserById($idToEdit);
        
        $user->setName($_POST["name"]);
        $user->setLastName($_POST["lastname"]);
        $user->setEmail($_POST["email"]);

        if($user->UpdateUser()){
            header("Location: /semiframework/".self::ROUTE."/".self::SHOW_ALL_USERS);
            die();
        } else {
            include "views/error.php";
        }

        
    }

    public function DeleteUser($paths){
        $idToDelete = $_POST["deleteId"];

        $result = UserModel::DeleteUserById($idToDelete);

        if($result){
            header("Location: /semiframework/".self::ROUTE."/".self::SHOW_ALL_USERS);
            die();
        } else {
            include "views/error.php";
        }

    }


}
