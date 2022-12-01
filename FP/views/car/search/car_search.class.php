<?php

/*
 * Author: Jawon Winbush
 * Date: 11/28/2022
 * Name: car_search.class.php
 */
class CarSearch extends CarIndexView {
    /*
     * the displays accepts an array of car objects and displays
     * them in a grid.
     */

     public function display($terms, $cars) {
        //display page header
        parent::displayHeader("Search Results");
        ?>
        <div id="main-header"> Search Results for <i><?= $terms ?></i></div>
        <span class="rcd-numbers">
            <?php
            echo ((!is_array($cars)) ? "( 0 - 0 )" : "( 1 - " . count($cars) . " )");
            ?>
        </span>
        <hr>

       <!-- display all records in a grid -->
               <div class="grid-container">
            <?php
            if ($cars === 0) {
                echo "No car was found.<br><br><br><br><br>";
            } else {
                //display cars in a grid; six cars per row
                foreach ($cars as $i => $car) {
                    $id = $car->getId();
                    $make = $car->getMake();
                    $model = $car->getModel();
                    $year = $car->getYear();
                    $price = $car->getPrice();
                    //$carCategory = $car->getCarCategory();
                    $image = $car->getImage();
                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . CAR_IMG . $image;
                    }
               if ($i % 6 == 0) {
                  echo "<div class='row'>";
              }
              
//                    echo "<div class='col'><p><a href='" . BASE_URL . "/car/detail/$id'><img src='" . $image .
//                    "'></a>" . /*<span>$make<br>$model<br>$carCategory</span>*/"</p></div>";
//                    ?>
<!--                    --><?php
        if ($i % 6 == 5 || $i == count($cars) - 1) {
              echo "</div>";
        }
                    echo "<div class='col'><p><a href='" . BASE_URL . "/car/detail/$id'><img src='" . $image .
                        "'></a><span>$make<br>$model<br>$year</span><br><span>$$price per day</span></p></div>";
                }
            }
            ?>  
        </div>
        <a href="<?= BASE_URL ?>/car/index">Go to car list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}