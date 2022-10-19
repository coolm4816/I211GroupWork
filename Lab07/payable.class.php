<?php
/*
* Names: Matt Cool, Jawon Winbush, Steven Casada
* File: payable.class.php
* Date: 10/19/22
* Description: Contains the Payable interface
*/

interface Payable{
    //Abstract methods
    public function getPaymentAmount();
    public function toString();
}