<?php
/*
* Names: Matt Cool, Jawon Winbush, Steven Casada
* File: employee.class.php
* Date: 10/19/22
* Description: Contains the abstract Employee class
*/

// The abstract Employee class
abstract class Employee extends Person implements Payable
{
    private $person; // object of Person class
    private $ssn;
    private static $employee_count = 0;

    //constructor
    public function __construct($person, $ssn)
    {
        $this->person = $person;
        $this->ssn = $ssn;
        self::$employee_count++;
    }

    //retrieve person object
    public function getPerson()
    {
        return $this->person;
    }

    //retrieve ssn of the employee
    public function getSsn()
    {
        return $this->ssn;
    }

    //retrieve Employee objects created
    public static function getEmployeeCount()
    {
        return self::$employee_count;
    }

    // toString method
    public function toString() {
        parent::toString();
       // echo "<b>Name: </b>" , $this->getPerson()->getFirstName(). " ". $this->getPerson()->getLastName();
        echo "<br><b>Social Security Number</b>: ". $this->getSsn();
    }

}