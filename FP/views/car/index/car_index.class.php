<?php
/**
 * Author: Steven Casada
 * Date: 11/17/2022
 * File: car_index.class.php
 * Description:
 */

class CarIndex extends CarIndexView {
    /*
     * the display method accepts an array of movie objects and displays
     * them in a grid.
     */

    public function display($cars) {
        //display page header
        parent::displayHeader("List All Movies");

        ?>
        <div id="main-header"> Movies in the Library</div>

        <div class="grid-container">
            <?php
            if ($cars === 0) {
                echo "No cars was found.<br><br><br><br><br>";
            } else {
                //display cars in a grid; six movies per row
                foreach ($cars as $car) {
                    $id = $car->getId();
                    $make = $car->getMake();
                    $model = $car->getModel();
                    $year = $car->getYear();
                    $image = $car->getImage();
                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . MOVIE_IMG . $image;
                    }

                    echo "<div class='item'><p><a href='", BASE_URL, "/movie/detail/$id'><img src='" . $image .
                        "'></a><span>$make<br>Rated $model<br>" . $year . "</span></p></div>";

                }
            }
            ?>
        </div>

        <?php
        //display page footer
        parent::displayFooter();

    } //end of display method
}