<?php
/**
 * Author: Matt Cool, Steven Casada, Jawon Winbush
 * Date: 11/17/2022
 * File: car_index.class.php
 * Description: display a list of cars
 */

class CarIndex extends CarIndexView {
    /*
     * the display method accepts an array of car objects and displays
     * them in a grid.
     */

    public function display($cars) {
        //display page header
        parent::displayHeader("List All Cars");

        ?>
        <div id="main-header"> Cars on the Lot</div>
        <div class="container">
        <div class="grid-container">
            <?php
            if ($cars === 0) {
                echo "No cars was found.<br><br><br><br><br>";
            } else {
                //display cars in a grid; six cars per row
                foreach ($cars as $car) {
                    $id = $car->getId();
                    $make = $car->getMake();
                    $model = $car->getModel();
                    $year = $car->getYear();
                    $image = $car->getImage();
                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . MOVIE_IMG . $image;
                    }

                    echo "<div class='item'><p><a href='", BASE_URL, "/car/detail/$id'><img width= 200px src='" . $image .
                        "'><br></a><div class='carDetails'><span class='make'>$make</span> <span class='model'>$model</span><br><span class='year'>" . $year . "</span></div></p></div>";

                }
            }
            ?>
        </div>
        </div>

        <?php
        //display page footer
        parent::displayFooter();

    } //end of display method
}