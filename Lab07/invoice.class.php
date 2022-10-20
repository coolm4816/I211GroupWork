<?php
/*
* Names: Matt Cool, Jawon Winbush, Steven Casada
* File: invoice.class.php
* Date: 10/19/22
* Description: Contains the invoice class
*/

class Invoice implements Payable{
    //Private attributes for part_number, part_description, quantity, price_per_item
    private $part_number, $part_description, $quantity, $price_per_item;

    //Static attribute to keep count of invoices created
    private static $invoice_count = 0;

    //constructor
    public function __construct($part_number, $part_description, $quantity, $price_per_item){
        $this->part_number = $part_number;
        $this->part_description = $part_description;
        $this->quantity = $quantity;
        $this->price_per_item = $price_per_item;

        self::$invoice_count++;
    }

    //Get methods for part number, part description, quantity and price per item
    public function getPartNumber(){
        return $this->part_number;
    }

    public function getPartDescription(){
        return $this->part_description;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function getPricePerItem(){
        return $this->price_per_item;
    }

    //Implementing the Payable methods
    public function getPaymentAmount(){
        return $this->price_per_item * $this->quantity;
    }

    public function toString(){
        echo "<b>Invoice</b><br>";
        echo "Part Number: ", $this->getPartNumber() , " ", $this->getPartDescription() , "<br>";
        echo "Quantity: ", $this->getQuantity(), "<br>";
        echo "Price per item: ", $this->getPricePerItem(), "<br>";
        printf("Payment: $%0.2f", $this->getPaymentAmount(), "<br>");
    }

    public function getInvoiceCount(){
        return self::$invoice_count;
    }

}