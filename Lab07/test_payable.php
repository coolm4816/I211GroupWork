<?php
/*
* Names: Matt Cool, Jawon Winbush, Steven Casada
* File: test_payable.php
* Date: 10/18/22
* Description: Contains the client program
*/

//Autoload the class files

//convert a camel cased string to a underscored string
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
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
        <title>Lab 07 - Payroll System</title>
    </head>

    <body>

    </body>
</html>
