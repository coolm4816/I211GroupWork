<?php
/*
* Names: Matt Cool, Jawon Winbush, Steven Casada
* File: test_payable.php
* Date: 10/18/22
* Description: Contains the client program
*/

//Autoload the class files

//convert a camel cased string to an underscored string
function camelCaseToUnderscore($str) {
    //store all characters in an array
    $characters = str_split($str);

    //covert the first character to a lowercase
    $characters[0] = strtolower($characters[0]);

    //exam all characters in the array
    //if a character is uppercase, replace it with a lowercase and prefix it with an underscore
    foreach ($characters as &$character) {
        if (ord($character) >= ord('A') && ord($character) <= ord('Z'))
            $character = '_' . strtolower($character);
    }

    //convert all elements in the array into a string and return the string
    return implode('', $characters);
}

spl_autoload_register(function($class_name){
    require_once camelCaseToUnderscore($class_name) . '.class.php';
});

// test company obj
echo"<h2>Lab 7</h2>";
printStarRow();

// create objs

$invoice1 = new Invoice("01234", "seat", 2, 375);
$invoice2 = new Invoice("56789", "tire", 4, 79.95);

$sal_employee = new SalariedEmployee("John", "Smith", "111-11-1111", 800);
$hrly_employee = new HourlyEmployee("Karen", "Price", "222-22-2222", 16.75, 40);
$comm_employee = new CommissionEmployee("Sue", "Jones", "333-33-3333", 10000,
    0.06);
$base_comm_employee = new BasePlusCommissionEmployee("Bob", "Lewis", "444-44-4444",
    5000, 0.04, 300);

// array to store objs
$objects = [
    $invoice1,
    $invoice2,
    $sal_employee,
    $hrly_employee,
    $comm_employee,
    $base_comm_employee
];

foreach ($objects as $object) {
    $object->toString();
    printStarRow();
}

// print a row of "*" chars
function printStarRow() {
    echo "*****************************************************<br>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
        <title>Lab 07 - Payroll System</title>
    </head>

    <body>
    <?php
    echo "<h2>" . Employee::getEmployeeCount() . " employees have been created.</h2>";
    echo "<h2>" . Invoice::getInvoiceCount() . " invoice have been created.</h2>";
    ?>
    </body>
</html>
