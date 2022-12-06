<?php
/**
 * Author: Matt Cool, Steven Casada, Jawon Winbush
 * Date: 12/6/2022
 * File: user.class.php
 * Description: define a class that describes user data
 */

class User{

    private $id, $fname, $lname, $email, $password, $isAdmin;

    //Array of car ID's for shopping cart, updated via cookies
    private $cart = [];

    public function __construct($id, $fname, $lname, $email, $password, $isAdmin, $cart){
        $this->id = $id;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
        $this->cart = $cart;
    }


    public function getId()
    {
        return $this->id;
    }


    public function getFname()
    {
        return $this->fname;
    }


    public function getLname()
    {
        return $this->lname;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function getIsAdmin()
    {
        return $this->isAdmin;
    }


    public function getCart()
    {
        return $this->cart;
    }

    public function setCart($arr)
    {
        $this->cart = array_merge($this->cart, $arr);
    }


}