<?php

require_once "models/DbConnection.php";

class UserModel {
    private static $procedureName = "sp_Usuarios";
    private $id;
    private $name;
    private $lastname;
    private $email;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getLastName(){
        return $this->lastname;
    }

    public function setLastName($lastname){
        $this->lastname = $lastname;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }


    public function InsertUser() {
        $option = "Insert";
        $statement = DbConnection::Connect()->prepare("CALL ".self::$procedureName."(:opcion,null,:nombre,:apellido,:email)");

        $statement->bindParam(":opcion", $option, PDO::PARAM_STR);
        $statement->bindParam(":nombre", $this->name, PDO::PARAM_STR);
        $statement->bindParam(":apellido", $this->lastname, PDO::PARAM_STR);
        $statement->bindParam(":email", $this->email, PDO::PARAM_STR);

        $result = true;
        try {
            $statement->execute();
        } catch(Exception $e){
            
            $result =  false;
        } 


        return $result;
    }

    public function UpdateUser(){
        $option = "EditUserById";
        $statement = DbConnection::Connect()->prepare("CALL ".self::$procedureName."(:opcion, :id, :nombre, :apellido, :email)");

        $statement->bindParam(":opcion", $option, PDO::PARAM_STR);
        $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
        $statement->bindParam(":nombre", $this->name, PDO::PARAM_STR);
        $statement->bindParam(":apellido", $this->lastname, PDO::PARAM_STR);
        $statement->bindParam(":email", $this->email, PDO::PARAM_STR);

        $result = true;
        try {
            $statement->execute();
        } catch(Exception $e){
            $result = false;
        }

        return $result;
    }

    public static function GetAllUsers() {
        $option = "GetAll";

        $statement = DbConnection::Connect()->prepare("CALL ".self::$procedureName."(:opcion, null, null, null, null)");

        $statement->bindParam(":opcion", $option, PDO::PARAM_STR);

        $result = true;
        try {
            $statement->execute();
            $result = $statement->fetchAll();
        }catch(Exception $e){
            $result = false;
        }


        return $result;
    }

    public static function GetUserById($id){
        $option = "GetUserById";

        $statement = DbConnection::Connect()->prepare("CALL ".self::$procedureName."(:opcion, :id, null, null,null)");

        $idToInt = intval($id);

        $statement->bindParam(":opcion", $option, PDO::PARAM_STR);
        $statement->bindParam(":id", $idToInt, PDO::PARAM_INT);

   
        $user = null;
        try {
            $statement->execute();
            $result = $statement->fetch();
            
            $user = new UserModel();
            $user->setId($result["Id"]);
            $user->setName($result["Nombre"]);
            $user->setLastName($result["Apellido"]);
            $user->setEmail($result["Email"]);
        }catch (Exception $e){
         
        }



        return $user;
    }

    public static function DeleteUserById($id){
        $option = "DeleteUserById";

        $statement = DbConnection::Connect()->prepare("CALL ".self::$procedureName."(:opcion, :id, null, null,null)");

        $idToInt = intval($id);

        $statement->bindParam(":opcion", $option, PDO::PARAM_STR);
        $statement->bindParam(":id", $idToInt, PDO::PARAM_INT);

        $result = true;
        try {
            $statement->execute();
        }catch(Exception $e){
            $result = false;
        }
        
        return $result;
    }
}