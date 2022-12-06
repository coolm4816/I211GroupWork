<?php

/* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 12/6/22
 * user_controller.class.php
 * Controls methods for the user class
 */

class UserController {
    private $user_model;

    //constructor
    public function __construct() {
        //create an instance of the user model
        $this->user_model = UserModel::getUserModel();
    }

    public function add(){

        $view = new Add();
        $view->display();

    }

    public function login() {

        //Create a login object and call appropriate view
        $view = new Login();
        $view->display();
    }

    public function verify() {

        //inform the user of successful log in
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

}
