<?php

/*
* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 11/8/22
* Name: user_controller.class.php
* Description: Define user actions
*/

class UserController{
    private $user_model;

    public function __construct(){
        $this->user_model = UserModel::getUserModel();
    }

    public function index(){
        $view = new Index();
        $view->display;
    }

    public function register(){
        $view = new Register();
        $view->display();
    }

    public function login(){
        $view = new Login();
        $view->display();
    }

    public function verify(){
        $view = new Verify();
        $view->display();
    }

    public function logout(){
        $view = new Logout();
        $view->display();
    }

    public function reset(){
        $view = new Reset();
        $view->display();
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