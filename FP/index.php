
<?php

/*
 * Author: Matt Cool
 * Date: 11/8/22
 * Name: index.php
 * Description: index file, retrieve the action and invoke the proper method
 */

//include code in vendor/autoload.php file
require_once ("vendor/autoload.php");

//create an object of UserController
$user_controller = new UserController();

//add your code below this line to complete this file
//establish the all variable to perform these functions below
$action = "index";



//filter and sanitize input
if (filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) && filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) != '') {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

//switch statement to implement the 8 possible values that the action variable can assume.
switch ($action) {
    case "index": 
        $user_controller -> index();
        break;
    case "register": 
        $user_controller -> register();
        break;
    case "login": 
        $user_controller -> login();
        break;
    case "verify":
        $user_controller -> verify();
        break;
    case "logout":
        $user_controller -> logout();
        break;
    case "reset":
        $user_controller -> reset();
        break;
    case "do_reset":
        $user_controller ->do_reset();
        break;
    default: 
        $user_controller -> error("Invalid action requested");
}
