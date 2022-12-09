<?php
/**
 * Author: Matt Cool, Steven Casada, Jawon Winbush
 * Date: 11/17/2022
 * File: car_model.class.php
 * Description: define class to get car data from the database
 */

class CarModel
{

    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblCar;
    private $tblCarCategories;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getCarModel method must be called.
    private function __construct()
    {
        try {
            $this->db = Database::getInstance();
            $this->dbConnection = $this->db->getConnection();
            if (!$this->db || !$this->dbConnection) {
                throw new DatabaseExecutionException("There was a problem connecting to the database");
            }
            $this->tblCar = $this->db->getCarTable();
            $this->tblCarCategories = $this->db->getCarCategoriesTable();
        }
        catch (DatabaseExecutionException $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
            exit(1);
        }
        catch (Exception $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
            exit(1);
        }


        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // initialize
        if (!isset($_SESSION['car_category'])) {
            $categories = $this->get_car_category();
            $_SESSION['car_category'] = $categories;
        }
    }

    //static method to ensure there is just one CarModel instance
    public static function getCarModel()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new CarModel();
        }
        return self::$_instance;
    }

    /*
     * the list_car method retrieves all cars from the database and
     * returns an array of car objects if successful or false if failed.
     */

    public function list_car()
    {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */


        $sql = "SELECT * FROM " . $this->tblCar . "," . $this->tblCarCategories .
            " WHERE " . $this->tblCar . ".category_id=" . $this->tblCarCategories . ".category_id";


        try {
            if (!$this->dbConnection) {
                throw new DatabaseExecutionException("Connection to the database could not be established.");
            }
            //execute the query
            $query = $this->dbConnection->query($sql);

            // if the query failed, return false.
            if (!$query)
                throw new DatabaseExecutionException("Error encountered when executing the SQL query");

            //if the query succeeded, but no car was found.
            if ($query->num_rows == 0)
                return 0;

            //handle the result
            //create an array to store all returned cars
            $cars = array();

            //loop through all rows in the returned recordsets
            while ($obj = $query->fetch_object()) {
                $car = new Car(stripslashes($obj->make), stripslashes($obj->model), stripslashes($obj->year), stripslashes($obj->image), stripslashes($obj->price), stripslashes($obj->description), stripslashes($obj->category));

                //set the id for the car
                $car->setId($obj->car_id);

                //add the car into the array
                $cars[] = $car;
            }
            return $cars;

        } catch (DatabaseExecutionException $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        } catch (Exception $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        }
    }

    public function list_categories()
    {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */


        $sql = "SELECT * FROM " . $this->tblCarCategories;

        try {
            //execute the query
            $query = $this->dbConnection->query($sql);

            // if the query failed, throw an error.
            if (!$query)
                throw new DatabaseExecutionException("Error encountered when executing the SQL query");

            //if the query succeeded, but no car was found.
            if ($query->num_rows == 0)
                return 0;

            //handle the result
            //create an array to store all returned cars
            $cars = array();

            //loop through all rows in the returned recordsets
            while ($obj = $query->fetch_object()) {
                $category = new Category($obj->category_id, $obj->category);

                //add the category into the array
                $categories[] = $category;
            }
            return $categories;

        } catch (DatabaseExecutionException $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        } catch (Exception $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        }
    }

    /*
     * the viewCar method retrieves the details of the car specified by its id
     * and returns a car object. Return false if failed.
     */

    public function view_car($id)
    {
        //the select sql statement
        $sql = "SELECT * FROM " . $this->tblCar . "," . $this->tblCarCategories .
            " WHERE " . $this->tblCar . ".category_id=" . $this->tblCarCategories . ".category_id" .
            " AND " . $this->tblCar . ".car_id='$id'";

        try {
            //execute the query
            $query = $this->dbConnection->query($sql);

            // if the query failed, throw an error
            if (!$query) {
                throw new DatabaseExecutionException("Error encountered when executing the SQL query");
            }

            if ($query && $query->num_rows > 0) {
                $obj = $query->fetch_object();

                //create a car object
                $car = new Car(stripslashes($obj->make), stripslashes($obj->model), stripslashes($obj->year), stripslashes($obj->image), stripslashes($obj->price), stripslashes($obj->description), stripslashes($obj->category));

                //set the id for the car
                $car->setId($obj->car_id);

                return $car;
            }

            return false;
        }
        catch (DatabaseExecutionException $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        }
        catch (Exception $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        }
    }

    //the update_car method updates an existing car in the database. Details of the car are posted in a form. Return true if succeed; false otherwise.
    public function update_car($id, $make, $model, $year, $price, $image, $description)
    {
        try {

            //if the script did not received post data, display an error message and then terminite the script immediately
            if (!filter_has_var(INPUT_POST, 'make') ||
                !filter_has_var(INPUT_POST, 'model') ||
                !filter_has_var(INPUT_POST, 'year') ||
                !filter_has_var(INPUT_POST, 'image') ||
                !filter_has_var(INPUT_POST, 'price') ||
                !filter_has_var(INPUT_POST, 'description')) {

                throw new DataMissingException("Missing data field. Please re-check your data");
            }


            if ((!strtotime($year))) {
                throw new InvalidDateException("Car year is invalid");
            }

            //query string for update
            $sql = "UPDATE " . $this->tblCar .
                " SET make='$make', model='$model', year='$year', image='$image', "
                . "price='$price', description='$description' WHERE id= $id";

            //execute the query
            $query = $this->dbConnection->query($sql);

            if (!$query) {
                throw new DatabaseExecutionException("Updating car failed");
            }

            return $query;
        } catch (DataMissingException $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        } catch (DatabaseExecutionException $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        } catch (InvalidDateException $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        } catch (Exception $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        }
    }

    //search the database for cars that match words in titles. Return an array of cars if succeed; false otherwise.
    public function search_car($terms)
    {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND search
        $sql = "SELECT * FROM " . $this->tblCar . "," . $this->tblCarCategories .
            " WHERE " . $this->tblCar . ".category_id=" . $this->tblCarCategories . ".category_id AND (1";

        foreach ($terms as $term) {
            $sql .= " AND model LIKE '%" . $term . "%' OR make LIKE '" . $term . "%'";
        }

        $sql .= ")";

        try {

            //execute the query
            $query = $this->dbConnection->query($sql);

            // the search failed, return false.
            if (!$query)
                throw new DatabaseExecutionException("An error occurred while searching the database");

            //search succeeded, but no car was found.
            if ($query->num_rows == 0)
                return 0;

            //search succeeded, and found at least 1 car found.
            //create an array to store all the returned cars
            $cars = array();

            //loop through all rows in the returned recordsets
            while ($obj = $query->fetch_object()) {
                $car = new Car($obj->make, $obj->model, $obj->year, $obj->image, $obj->price, $obj->description, $obj->category);

                //set the id for the car
                $car->setId($obj->car_id);

                //add the car into the array
                $cars[] = $car;
            }
            return $cars;
        }
        catch (DatabaseExecutionException $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        }
        catch (Exception $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        }
    }

    // add new car to the database
    public function create($id, $categoryId, $image, $description, $price, $make, $model, $year)
    {
        $id = $this->dbConnection->real_escape_string(trim($id));
        $categoryId = $this->dbConnection->real_escape_string(trim($categoryId));
        $image = $this->dbConnection->real_escape_string(trim($image));
        $description = $this->dbConnection->real_escape_string(trim($description));
        $price = $this->dbConnection->real_escape_string(trim($price));
        $make = $this->dbConnection->real_escape_string(trim($make));
        $model = $this->dbConnection->real_escape_string(trim($model));
        $year = $this->dbConnection->real_escape_string(trim($year));

        //query string for update
        $sql = "INSERT INTO " . $this->tblCar . " (`car_id`, `category_id`, `image`, `description`, `price`, `make`, `model`, `year`)" .
            "VALUES " . "('$id', '$categoryId', '$image', '$description', '$price', '$make', '$model', '$year')";

        try {

        //execute the query
        $query = $this->dbConnection->query($sql);

        if (!$query) {
            throw new DatabaseExecutionException("An error occurred while try to insert the data");
        }
        return $query;
        }
        catch (DatabaseExecutionException $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        }
        catch (Exception $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        }
    }


    //get the car categories
    private function get_car_category()
    {
        $sql = "SELECT * FROM " . $this->tblCarCategories;

        try {
            //execute the query
            $query = $this->dbConnection->query($sql);

            if (!$query) {
                throw new DatabaseExecutionException("An error occurred while fetching the car categories table.");
            }

            //loop through all rows
            $categories = array();
            while ($obj = $query->fetch_object()) {
                $category[$obj->category] = $obj->category_id;
            }
            return $categories;
        }
        catch (DatabaseExecutionException $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        }
        catch (Exception $exc) {
            $view = new CarError();
            $view->display($exc->getMessage());
        }
    }
}