<?php

/*
* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 11/8/22
* Name: user_controller.class.php
* Description: Define user actions
*/

class UserController{
    private $user_model;

    // constructor
    public function __construct(){
        $this->user_model = UserModel::getUserModel();
    }

    // define method to display index page
    public function index(){
        $view = new Index();
        $view->display();
    }

    // define method to display account creation status
    public function register($message){
        $this->user_model->add_user();
        $view = new Register();
        $view->display($message);

    }

    // define method tp display login page
    public function login(){
        $view = new Login();
        $view->display();
    }

    public function verify($message){
        $this->user_model->verify_user();
        $view = new Verify();
        $view->display($message);

    }

    public function logout(){
        $this->user_model->logout();
        $view = new Logout();
        $view->display();

    }

    public function reset($username){
        $view = new Reset();
        $this->do_reset();
        $view->display($username);
    }

    public function do_reset(){
        $reset = $this->user_model->reset_password();

        if(!$reset){
            //Display an error
            $message = "There was an issue with resetting your password.";
            $this->error($message);
        }
    }

    public function error($message){
        $error = new UserError();
        $error->display($message);
    }
}