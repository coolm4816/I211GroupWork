<?php

/*
* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 11/8/22
* Name: user_controller.class.php
* Description: Define user methods
*/

class UserModel{
    //private data members for DB
    private $db;
    private $dbConnection;
    static private $_instance = NULL;

    private function __construct(){
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblUser = $this->db->getUserTable();

    }
    public static function getUserModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new UserModel();
        }
        return self::$_instance;
    }

    public function add_user(){
        //Check that the post data has been received
        if (!filter_has_var(INPUT_POST, 'username') ||
            !filter_has_var(INPUT_POST, 'password') ||
            !filter_has_var(INPUT_POST, 'email') ||
            !filter_has_var(INPUT_POST, 'firstname') ||
            !filter_has_var(INPUT_POST, 'lastname')){

            return false;
        }
        $username = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
        $email = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)));
        $firstname = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)));
        $lastname = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING)));
        $hashPassword = password_hash($this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));

        //sql statement
        $sql = "INSERT INTO $this->tblUser (username, password, email, firstname, lastname) VALUES ('$username', '$hashPassword', '$email', '$firstname', '$lastname')";

        $query = $this->dbConnection->query($sql);

        if (!$query){
            return false;
        }
        else{
            return true;
        }
    }

    public function verify_user()
    {
        $username = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
        $password = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

        $sql = "SELECT * FROM $this->tblUser WHERE username = '$username'";

        $query = $this->dbConnection->query($sql);

        if (!$query || $query->num_rows == 0){
            return false;
        }
        if(password_verify($password, $query->password)){
            set_cookie("username", $query->username);
            return true;
        }

    }

    public function logout(){
        if(isset($_COOKIE["username"])){
            unset($_COOKIE["username"]);
            return true;
        }
        else{
            return false;
        }
    }

    public function reset_password(){
        if (!filter_has_var(INPUT_POST, 'password')){
            return false;
        }

        $username = $_COOKIE["username"];
        $password = password_hash($this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));

        $sql = "UPDATE " . $this->tblUser . " SET password='$password' WHERE username='$username'";

        return $this->dbConnection->query($sql);
    }
}