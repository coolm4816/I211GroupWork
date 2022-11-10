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
        //hash the user's password to insert into DB
        $hashPassword = password_hash($_POST['password']);

        //sql statement
        $sql = "INSERT INTO " . $this->tblUser . "('username', 'password', 'email', 'firstname', 'lastname') VALUES (";
    }

    public function verify_user()
    {
        $hashPassword = password_hash($_POST['password']);
        //sql statement
        $sql = "SELECT * FROM" . $this->tblUser . "WHERE username = \"" . $_POST['username'] . "\" AND password = \"" . $hashPassword . "\"";

        $query = $this->dbConnection->query($sql);

        if (!$query) {
            return false;
        } else if ($query->num_rows == 0) {
            return false;
        } else {
            $_COOKIE['username'] = $query->username;
            return true;
        }
    }
}