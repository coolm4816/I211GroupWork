<?php
/*
* Names: Matt Cool, Jawon Winbush, Steven Casada
* File: salaried_employee.class.php
* Date: 10/19/22
* Description: Contains the SalariedEmployee class that inherits from Employee
*/

// The SalariedEmployee class
class SalariedEmployee extends Employee {

    //private attributes
    private $weekly_salary;
    private static $employee_count = 0;

    //constructor
    public function __construct($firstname, $lastname, $ssn, $weekly_salary) {
        parent::__construct($firstname, $lastname, $ssn);
        $this->weekly_salary = $weekly_salary;
        self::$employee_count++;
    }

    //get weekly salary
    public function getWeeklySalary() {
        return $this->weekly_salary;
    }

    //retrieve payment 
    public function getPaymentAmount() {
        return $this->getWeeklySalary();
    }

    //toString to display Salaried employees' and their wages
    public function toString() {
        echo"<h2>Salaried Employee</h2>";
        parent::toString();
        echo "<br><b>Weekly Salary:</b> $" , number_format($this->getWeeklySalary(), 2, '.', ',');
        echo"<br>";
        echo "<b>Payment Amount: </b>" , number_format($this->getPaymentAmount(), 2, '.', ',');
        echo"<br>";
    }

}