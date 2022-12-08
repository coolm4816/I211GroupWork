<?php

/* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 12/6/22
 * user_controller.class.php
 * Controls methods for the user class
 */

class UserModel{
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblUser;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getCarModel method must be called.
    private function __construct()
    {
        $this->db = Database::getInstance();
        $this->dbConnection = $this->db->getConnection();
        $this->tblUser = $this->db->getUserTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    //static method to ensure there is just one CarModel instance
    public static function getUserModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new UserModel();
        }
        return self::$_instance;
    }

    //method for adding cars to the database
    public function add_car($make, $model, $year, $image, $price){

        try{

            $sql = "INSERT INTO" . $this->tblCar . "(make, model, year, image, price) . VALUES ('$make', '$model', '$year', '$image', '$price')";

            //execute the query
            $query = $this->dbConnection->query($sql);

            if (!$query) {
                throw new DatabaseExecutionException("Adding car failed");
            }

            return $query;
        }
        catch (DataMissingException $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        }
        catch (DatabaseExecutionException $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        }
        catch (InvalidDateException $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        }
        catch (Exception $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        }
    }


    public function verify_user()
    {

        // Need to verify hashed password

        // retrieve values from form
        $email = $_POST["email"];
        $password = $_POST["password"];

        //go into the database and check for username
        $sql = "SELECT * FROM users WHERE (email = '" . $email . "')";
        $result = mysqli_query($this->dbConnection, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $hash = $row['password'];
        $id = $row['id'];


        if ($password == $hash) {
            setcookie("email", $email);
            setcookie('id', $id);
            return true;
        } else {
            echo $row['password'];
            echo $row['id'];
            echo $row['fname'];
            return false;
        }
    }

    //unset a cookie to log the user out
    public function logout() {
        unset($_COOKIE['id']);
        unset($_COOKIE['email']);
        return true;
    }






}