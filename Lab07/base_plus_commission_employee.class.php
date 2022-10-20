<?php
/*
* Names: Matt Cool, Jawon Winbush, Steven Casada
* File: base_plus_commission_employee.class.php
* Date: 10/19/22
* Description: Contains the BasePlusCommissionEmployee class that inherits from CommissionEmployee
*/

Class BasePlusCommissionEmployee extends CommissionEmployee {

    // class attributes
    private $base_salary;

    // class constructor
    public function __construct($person, $ssn, $sales, $commission_rate, $base_salary) {
        parent::__construct($person, $ssn, $sales, $commission_rate);
        $this->base_salary = $base_salary;
    }

    // class getters
    public function getBaseSalary() {
        return $this->base_salary;
    }

    // base commission employees receive sales commission plus a monthly salary
    public function getPaymentAmount() {
        return parent::getPaymentAmount() + $this->base_salary;
    }

    // toString method
    public function toString() {
        echo "<h2>Base Plus Commission Employee</h2>";
        Employee::toString();
        echo "<br>Gross sale: $", number_format($this->getSales(), 2,'.',',');
        printf ("<br>Commission rate: $%0.2f" , $this->getCommission_rate());
        echo "<br>Base salary: $", number_format($this->getBaseSalary(), 2, '.', ',');
        echo "<br>Earning: $" ,
            number_format($this->getPaymentAmount(), 2, '.', ',');
    }
}
