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
//Default action
$action = "index";

if (isset($_GET['action']) && !(empty($_GET['action']))){
    $action = $_GET['action'];
}

//invoke appropriate method depending on action value
if($action === 'index'){
    $user_controller->index();
}
else if ($action === 'error'){
    //default error message
    $message = "An error has occurred.";

    //retrieve the error message
    if ((isset($_GET['message'])) && !(empty($_GET['message']))){
        $message = $_GET['message'];
        $user_controller->error($message);
    }
    else{
        $message = "Invalid action was requested.";
        $user_controller->error($message);
    }
}

else if ($action === 'register'){
    $user_controller->register();


}
else if ($action === 'login'){
    $user_controller->login();


}
else if ($action === 'verify'){
    $user_controller->verify();


}
else if ($action === 'logout'){
    $user_controller->logout();


}
else if ($action === 'reset'){
    $user_controller->reset();


}
else if ($action === 'do_reset'){
    $user_controller->do_reset();

}