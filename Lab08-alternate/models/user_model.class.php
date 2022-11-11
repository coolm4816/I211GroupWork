<?php

/*
* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 11/8/22
* Name: user_model.class.php
* Description: Handles data manipulation too and from the database
*/
class UserModel {
    
    // attributes
    private $db; // database object
    private $dbConnect; // database connect object
    
    // constructor
    public function __construct() {
        $this->db = Database::getInstance();
        $this->dbConnect = $this->db->getConnection();
    }
    
    // public methods 
    public function add_user() {
        
        // get form field values 
        $username    = $_POST["username"];
        $password    = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $email       = $_POST["email"];
        $firstName   = $_POST["first-name"];
        $lastName    = $_POST["last-name"];
        
        // build SQL statement
        // might have to add '' around variables
        $sql = "INSERT INTO users (username, password, email, firstname, lastname) VALUES ('" . $username . 
                "','" . $password . "','" . $email . "','" . $firstName . "','" . $lastName . "')"; 
        
        // insert into table and return true/false depending on success
        if ($this->dbConnect->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
        
    }
    
    public function verify_user() {
        
        // Need to verify hashed password
        
        // retrieve values from form
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        //go into the database and check for username
        $sql = "SELECT * FROM users WHERE (username = '" . $username . "')";
        $result = mysqli_query($this->dbConnect,$sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $hash = $row['password'];
        
        
        
        
        if (password_verify($password, $hash )) {
            setcookie("user", $username);
            return true;
        } else {
            echo $hash;
            return false;
        }
         

        
    }
    
    //unset a cookie to log the user out
    public function logout() {
        unset($_COOKIE['user']);
        return true;
    }
    
    //function to reset the user's password
    public function reset_password() {
        $username = $_POST["username"];
        
        //make sure the new password is also hashed.
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        
        //SQL statement to find that exact user's credentials
        $sql = "UPDATE users SET password='" . $password . "' WHERE username='" . $username . "'";
        
        //query to determine the user's credentials matched.
        if ($this->dbConnect->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
        
        
    }
}
