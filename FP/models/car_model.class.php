<?php


class CarModel {

    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblCar;
    private $tblCarCategory;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getMovieModel method must be called.
    private function __construct() {
        $this->db = Database::getInstance();
        $this->dbConnection = $this->db->getConnection();
        $this->tblCar = $this->db->getCarTable();
        $this->tblCarCategory = $this->db->getCarCategoriesTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

        // initialize
        if (!isset($_SESSION['car_category'])) {
            $categories = $this->get_car_category();
            $_SESSION['car_category'] = $categories;
        }
    }

    //static method to ensure there is just one MovieModel instance
    public static function getCarModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new CarModel();
        }
        return self::$_instance;
    }

    /*
     * the list_movie method retrieves all cars from the database and
     * returns an array of car objects if successful or false if failed.
     * car should also be filtered by ratings and/or sorted by titles or rating if they are available.
     */

    public function list_car() {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

        $sql = "SELECT * FROM " . $this->tblCar . "," . $this->tblCarCategory .
            " WHERE " . $this->tblCar . "category=" . $this->tblCarCategory . "category_id";

        try {
            //execute the query
            $query = $this->dbConnection->query($sql);

            // if the query failed, return false.
            if (!$query)
                throw new DatabaseExecutionException("Error encountered when executing the SQL query");

            //if the query succeeded, but no movie was found.
            if ($query->num_rows == 0)
                return 0;

            //handle the result
            //create an array to store all returned movies
            $cars = array();

            //loop through all rows in the returned recordsets
            while ($obj = $query->fetch_object()) {
                $car = new Car(stripslashes($obj->make), stripslashes($obj->model), stripslashes($obj->year), stripslashes($obj->image), stripslashes($obj->description));

                //set the id for the movie
                $car->setId($obj->id);

                //add the movie into the array
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

    /*
     * the viewMovie method retrieves the details of the movie specified by its id
     * and returns a movie object. Return false if failed.
     */

    public function view_car($id) {
        //the select ssql statement
        $sql = "SELECT * FROM " . $this->tblCar . "," . $this->tblCarCategory .
            " WHERE " . $this->tblMovie . ".category=" . $this->tblCarCategory . ".rating_id" .
            " AND " . $this->tblCar . ".id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a movie object
            $car = new Car(stripslashes($obj->make), stripslashes($obj->model), stripslashes($obj->year), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for the movie
            $car->setId($obj->id);

            return $car;
        }

        return false;
    }

    //the update_movie method updates an existing movie in the database. Details of the movie are posted in a form. Return true if succeed; false otherwise.
    public function update_car($id) {
        try {
            //if the script did not received post data, display an error message and then terminite the script immediately
            if (!filter_has_var(INPUT_POST, 'title') ||
                !filter_has_var(INPUT_POST, 'rating') ||
                !filter_has_var(INPUT_POST, 'release_date') ||
                !filter_has_var(INPUT_POST, 'director') ||
                !filter_has_var(INPUT_POST, 'image') ||
                !filter_has_var(INPUT_POST, 'description')) {

                throw new DataMissingException("Missing data field. Please re-check your data");
            }

            //retrieve data for the new movie; data are sanitized and escaped for security.
            $title = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'title')));
            $rating = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'rating')));
            $release_date = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'release_date'));
            $director = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'director')));
            $image = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'image')));
            $description = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'description')));

            if((!strtotime($release_date))) {
                throw new InvalidDateException("Release date is invalid");
            }

            //query string for update
            $sql = "UPDATE " . $this->tblMovie .
                " SET title='$title', rating='$rating', release_date='$release_date', director='$director', "
                . "image='$image', description='$description' WHERE id='$id'";

            //execute the query
            $query = $this->dbConnection->query($sql);

            if (!$query) {
                throw new DatabaseExecutionException("Updating movie failed");
            }

            return $query;
        }
        catch (DataMissingException $exc) {
            $view = new MovieError();
            $view->display($exc->getMessage());
        }
        catch (DatabaseExecutionException $exc) {
            $view = new MovieError();
            $view->display($exc->getMessage());
        }
        catch (InvalidDateException $exc) {
            $view = new MovieError();
            $view->display($exc->getMessage());
        }
        catch (Exception $exc) {
            $view = new MovieError();
            $view->display($exc->getMessage());
        }
    }

    //search the database for movies that match words in titles. Return an array of movies if succeed; false otherwise.
    public function search_movie($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND serach
        $sql = "SELECT * FROM " . $this->tblMovie . "," . $this->tblMovieRating .
            " WHERE " . $this->tblMovie . ".rating=" . $this->tblMovieRating . ".rating_id AND (1";

        foreach ($terms as $term) {
            $sql .= " AND title LIKE '%" . $term . "%'";
        }

        $sql .= ")";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false.
        if (!$query)
            return false;

        //search succeeded, but no movie was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 movie found.
        //create an array to store all the returned movies
        $movies = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $movie = new Movie($obj->title, $obj->rating, $obj->release_date, $obj->director, $obj->image, $obj->description);

            //set the id for the movie
            $movie->setId($obj->id);

            //add the movie into the array
            $movies[] = $movie;
        }
        return $movies;
    }

    //get the car categories
    private function get_car_category() {
        $sql = "SELECT * FROM " . $this->tblCarCategory;

        //execute the query
        $query = $this->dbConnection->query($sql);

        if (!$query) {
            return false;
        }

        //loop through all rows
        $categories = array();
        while ($obj = $query->fetch_object()) {
            $category[$obj->category] = $obj->category_id;
        }
        return $categories;
    }

}