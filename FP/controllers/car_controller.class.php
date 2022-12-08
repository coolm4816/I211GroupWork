<?php

/* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 11/16/22
 * car_controller.class.php
 * perform the functions of the various class pages
 */

class CarController
{

    private $car_model;

    // define constructor
    public function __construct()
    {
        // create an instance of the CarModel
        $this->car_model = CarModel::getCarModel();
    }

    // index directory that lists all the cars
    public function index()
    {
        // get all the cars and return then in an array
        $cars = $this->car_model->list_car();

        //TODO: add error handling

        // display cars
        $view = new CarIndex();
        $view->display($cars);
    }

    //show details of a car
    public function detail($id) {
        //retrieve the specific movie
        $car = $this->car_model->view_car($id);

        if (!$car) {
            //display an error
            $message = "There was a problem displaying the movie id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //display movie details
        $view = new CarDetail();
        $view->display($car);
    }


    //search for a car
    public function search()
    {
        //retrieves terms from the search box
        $query_terms = trim($_GET['query-terms']);

        //if search box is empty, all cars are listed
        if ($query_terms == "") {
            $this->index();
        }

        //search for matching cars in the database
        $cars = $this->car_model->search_car($query_terms);

        if ($cars === false) {
            //error display
            $message = "There was an error in the search query.";
            $this->error($message);
            return;
        }

        if ($cars === 0) {
            $search = new CarSearch();
            $search->display($query_terms, $cars);
        } else {
            //matched cars for display
            $search = new CarSearch();
            $search->display($query_terms, $cars);
        }
    }

    //autosuggest feature
    public function suggest($terms)
    {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $cars = $this->car_model->search_car($query_terms);

        //retrieve all cars to be stored in following array
        $info = array();
        if ($cars) {
            foreach ($cars as $car) {
                $info[] = $car->getMake() . " ".$car->getModel();
            }
        }

        echo json_encode($info);
    }

    //to handle and display all types of errors
    public function error($message)
    {
        //creates Error class object
        $error = new CarError();

        //display errors on page
        $error->display($message);
    }

}