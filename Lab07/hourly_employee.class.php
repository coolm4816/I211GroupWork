<?php
/*
* Names: Matt Cool, Jawon Winbush, Steven Casada
* File: hourly_employee.class.php
* Date: 10/19/22
* Description: Contains the HourlyEmployee class that inherits from Employee
*/

// The HourlyEmployee class
class HourlyEmployee extends Employee {

    //private attributes
    private $wage;
    private $hours;

    //constructor
    public function __construct($person, $ssn, $wage, $hours) {
        parent::__construct($person, $ssn);
        $this->wage = $wage;
        $this->hours = $hours;
    }

    //retrieve wage
    public function getWage() {
        return $this->wage;
    }

    //retrieve number of hours the employee worked
    public function getHours() {
        return $this->hours;
    }

    //retrieve employee's payment
    public function getPaymentAmount() {
        if($this->hours <= 40) {
            return ($this->wage * $this->hours);
        }
        else {
            return ($this->wage * 40) + (1.5 *  $this->wage * ($this->hours - 40));
        }
    }

    //toString to display hourly employees and their wages
    public function toString() {
        echo "<h2>Hourly Employee</h2>";
        parent::toString();
        printf ("<br><b>Wage per hour:</b> $%0.2f</b>" , $this->getWage());
        echo "<br><b>Hours: </b>" , $this->getHours();
        echo "<br><b>Earning:</b> $" , number_format($this->getPaymentAmount(), 2, '.', ',');
    }

}
