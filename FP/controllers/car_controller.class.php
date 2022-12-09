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

        //display car details
        $view = new CarDetail();
        $view->display($car);
    }

    // add car to database
    public function add()
    {
        $cars = $this->car_model->list_car();

        // get the id of the last element
        $index = (count($cars))-1;
        $id = $cars[$index]->getId() ;

        // add 1 to make unique id
        $id += 1;

        $categories = $this->car_model->list_categories();

        // display all movies
        $view = new AdminAddCar();
        $view->display($id, $categories);
    }

    // edit existing car in database
    public function edit($id)
    {
        //retrieve the specific car
        $car = $this->car_model->view_car($id);

        if (!$car) {
            //display an error
            $message = "There was a problem displaying the car id='" . $id . "'.";
            $this->error($message);
            return;
        }

        $view = new CarEdit();
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

    // add new car to the database
    public function create()
    {
        //if the script did not received post data, display an error message and then terminite the script immediately
        if (!filter_has_var(INPUT_POST, 'id') ||
            !filter_has_var(INPUT_POST, 'category') ||
            !filter_has_var(INPUT_POST, 'make') ||
            !filter_has_var(INPUT_POST, 'model') ||
            !filter_has_var(INPUT_POST, 'year') ||
            !filter_has_var(INPUT_POST, 'price') ||
            !filter_has_var(INPUT_POST, 'image') ||
            !filter_has_var(INPUT_POST, 'description')) {

            return false;
        }

        $id = filter_input(INPUT_POST, 'id');
        $category = filter_input(INPUT_POST, 'category');
        $make = filter_input(INPUT_POST, 'make');
        $model = filter_input(INPUT_POST, 'model');
        $year = filter_input(INPUT_POST, 'year');
        $price = filter_input(INPUT_POST, 'price');
        $image = filter_input(INPUT_POST, 'image');
        $description = filter_input(INPUT_POST, 'description');

        $this->car_model->create($id, $category, $image, $description, $price, $make, $model, $year);

        $car = new Car($make, $model, $year, $image, $price, $description, $category);

        $view = new CarDetail();
        $view->display($car);

    }

    public function update($id){
        if (!filter_has_var(INPUT_POST, 'id') ||
            !filter_has_var(INPUT_POST, 'make') ||
            !filter_has_var(INPUT_POST, 'model') ||
            !filter_has_var(INPUT_POST, 'year') ||
            !filter_has_var(INPUT_POST, 'price') ||
            !filter_has_var(INPUT_POST, 'image') ||
            !filter_has_var(INPUT_POST, 'description')) {

            return false;
        }

        $id = filter_input(INPUT_POST, 'id');
        $make = filter_input(INPUT_POST, 'make');
        $model = filter_input(INPUT_POST, 'model');
        $year = filter_input(INPUT_POST, 'year');
        $price = filter_input(INPUT_POST, 'price');
        $image = filter_input(INPUT_POST, 'image');
        $description = filter_input(INPUT_POST, 'description');

        $this->car_model->update_car($id, $make, $model, $year, $price, $image, $description);

        $car = new Car($make, $model, $year, $image, $price, $description);

        $view = new CarDetail();
        $view->display($car);



    }

}