<?php
/**
 * Author: Matt Cool, Steven Casada, Jawon Winbush
 * Date: 11/17/2022
 * File: car.class.php
 * Description: define a class that describes car data
 */

class Car {

    // private attributes
    private $id, $make, $model, $year, $image, $description;

    // define constructor
    public function __construct($make, $model, $year, $image, $description) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
        $this->image = $image;
        $this->description = $description;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getMake()
    {
        return $this->make;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getDescription()
    {
        return $this->description;
    }


}