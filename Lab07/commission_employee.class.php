<?php
/*
* Names: Matt Cool, Jawon Winbush, Steven Casada
* File: commission_employee.class.php
* Date: 10/19/22
* Description: Contains the CommissionEmployee class that inherits from Employee
*/

Class CommissionEmployee extends Employee {

    // define attributes
    private $sales;
    private $commission_rate;

    // class constructor
    public function __construct($firstname, $lastname, $ssn, $sales, $commission_rate) {
        parent::__construct($firstname, $lastname, $ssn);
        $this->sales = $sales;
        $this->commission_rate = $commission_rate;
    }

    // class getters
    public function getSales() {
        return $this->sales;
    }

    public function getCommission_rate() {
        return $this->commission_rate;
    }

    // pay amount is the commission rate of total sales
    public function getPaymentAmount() {
        return $this->sales * $this->commission_rate;
    }

    // toString method
    public function toString() {
        echo "<h2>Commission Employee</h2>";
        parent::toString();
        echo "<br><b>Gross sale:</b> $", number_format($this->getSales(), 2,'.',',');
        printf ("<br><b>Commission rate:</b> $%0.2f" , $this->getCommission_rate());
        echo "<br><b>Earning:</b> $" ,
            number_format($this->getPaymentAmount(), 2, '.', ','), "<br>";
    }
}