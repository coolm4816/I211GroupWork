<?php
/*
 * Names: Matt Cool, Jawon Winbush, Steven Casada
 * File: person.class.php
 * Date: 10/18/22
 * Description: Contains the Person class
 */

class Person{

    //Private attributes for first and last name
    private $first_name;
    private $last_name;

    //constructor
    public function __construct($first_name, $last_name){
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    //Get methods for retrieving first and last names
    public function getFirstName(){
        return $this->first_name;
    }
    public function getLastName(){
        return $this->last_name;
    }

    //Display info as a string
    public function toString(){
        echo "Name: ", $this->getFirstName(), " ", $this->getLastName(), "<br>";
    }

}