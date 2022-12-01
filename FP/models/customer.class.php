<?php
/**
 * Author: Matt Cool, Steven Casada, Jawon Winbush
 * Date: 11/22/2022
 * File: customer.class.php
 * Description: define a class that describes a customer's account
 */

class Customer
{
    // private class attributes
    private $id, $username, $password, $fullname, $email, $car_id;

    // define constructor for customer class
    public function __construct($username, $password, $fullname, $email, $car_id)
    {
        $this->username = $username;
        $this->password = $password;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->car_id = $car_id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getFullname()
    {
        return $this->fullname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCarId()
    {
        return $this->car_id;
    }
}
