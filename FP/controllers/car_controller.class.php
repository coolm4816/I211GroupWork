<?php

/* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 11/16/22
 * car_controller.class.php
 * perform the functions of the various class pages
 */

class CarController {

    private $car_model;

    // define constructor
    public function __construct() {
        // create an instance of the CarModel
        $this->car_model = CarModel::getCarModel();
    }

    // index directory that lists all the cars
    public function index() {
        // get all the cars and return then in an array
        $cars = $this->car_model->list_car();

        //TODO: add error handling

        // display cars
        $view = new CarIndex();
        $view->display($cars);
    }

    // show details of a car
    public function detail($id) {

    }
}