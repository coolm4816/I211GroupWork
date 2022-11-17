<?php

/* Author: Matt Cool, Steven Casada, Jawon Winbush
 * Date: 11/8/22
 * Name: database.class.php
 * Description: 
 */

class Database {

    //define database parameters
    private $param = array(
        'host' => 'localhost',
        'login' => 'phpuser',
        'password' => 'phpuser',
        'database' => 'rentalcar_db',
        'tblUser' => 'customers',
        'tblCar' => 'cars',
        'tblCarCategories' => 'car_categories'
    );
    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //constructor
    public function __construct() {

        $this->objDBConnection = @new mysqli(
            $this->param['host'],
            $this->param['login'],
            $this->param['password'],
            $this->param['database']
        );
        if (mysqli_connect_errno() != 0) {
            exit("Connecting to database failed: " . mysqli_connect_error());
        }
    }

    //static method to ensure there is just one Database instance
    static public function getInstance() {
        if (self::$_instance == NULL) {
            self::$_instance = new Database();
        }
        return self::$_instance;
    }

    //this function returns the database connection object
    public function getConnection() {
        return $this->objDBConnection;
    }

    //returns the name of the table storing users
    public function getUserTable() {
        return $this->param['tblUser'];
    }

    // returns the name of the table storing cars
    public function getCarTable() {
        return $this->param['tblCar'];
    }

    // returns the name of the table storing car category
    public function getCarCategoriesTable() {
        return $this->param['tblCarCategories'];
    }
}