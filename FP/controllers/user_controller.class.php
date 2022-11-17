<?php

/* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 11/16/22
 * user_controller.class.php
 * perform the functions of the various class pages
 */

class UserController {

     //private user model attribute for calling up the functions in the user model class later
     private $user_model;

     //constructor to initialize a new user model object
     public function __construct() {
         $this->user_model = new UserModel();
     }
 
     //function to create the Index object and display its results
     public function index() {
         $view = new Index();
         $view->display();
     }
 
     public function register() {
         
         //variable set to a boolean to either inform the user of a successful registration or reject them
         $response = $this->user_model->add_user();
 
         //create a Register object
         $user = new Register();
         
         //output to the user the response clarifying whether or not they have successfully registered
         $user->display($response);
     }
 
     public function login() {
         
         //create a log in object, then invoke the display method of the login to ensure it happened
         $view = new Login();
         $view->display();
     }
 
     public function verify() {
 
         //create a variable that returns true or false if the user managed to log in
         $response = $this->user_model->verify_user();
 
         //create a Verify object, output the response if as true or false to the user by passing the $response variable through the display method.
         $view = new VerifyUser();
         $view->display($response);
     }
 
     public function logout() {
 
         //execute the logout function
         $this->user_model->logout();
 
         //create a logout object, output the logout page to the user
         $view = new Logout();
         $view->display();
     }
 
     public function reset() {
         
         //create a reset object, execute the reset to the user and invoke the display method to output on the page
         $view = new Reset();
         $view->display();
     }
 
     public function do_reset() {
 
         //create a boolean that stores whether the user managed to sucessfully reset
         $response = $this->user_model->reset_password();
 
         //pass a variable into the display method to show the user whether they successfully invoked the display method
         $view = new ResetConfirm();
         $view->display($response);
     }
 
     //pass the error message as an argument into the error method's parameter
     public function error($message) {
 
         //create an error object, then display the error message to the user
         $view = new UserError();
         $view->display($message);
     }

}