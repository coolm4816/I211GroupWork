<?php
/**
 * Author: Jawon Winbush
 * Date: 12/7/22
 * File: admin_add_car.class.php
 * Description: defines class that adds a car to database, method of displaying form
 */

class AdminAddCar extends CarIndexView {

    public function display($car) {
        //display page header
        parent::displayHeader("Add car");

        //get car categories from a session variable
        if (isset($_SESSION['car_categories'])) {
            $categories = $_SESSION['car_categories'];
        }

        $id = $car->getId();

        ?>

        <div id="main-header">Add new car details</div>

        <!-- display car details in a form -->
        <form class="new-media"  action="<?= BASE_URL ?>/car/create/" method="post" style="margin-top: 10px; padding: 10px;">
            <input style="min-width: 90%; padding-left: 8px;" type="hidden" name="id" value="<?= $id ?>">

            <p>
                <strong>Category</strong>:
                <?php
                foreach ($categories as $c_category => $c_id) {
                    echo "<input type='radio' name='category' value='$c_id' > $c_category &nbsp;&nbsp;";
                }
                ?>
            </p>

            <p>
                <strong>Make</strong>
                <input class="car-details" style="min-width: 90%; padding-left: 8px;" name="make" placeholder="Make: brand of the vehicle" type="text" size="100" value="" required autofocus>
            </p>

            <p>
                <strong>Model</strong>
                <input class="car-details" style="min-width: 90%; padding-left: 8px;" name="model" placeholder="Model: specific type of vehicle" type="text" size="40" value="" required="">
            </p>

            <p>
                <strong>Year</strong
                <input class="car-details" style="min-width: 90%; padding-left: 8px;" name="year" placeholder="Model year: year the vehicle was manufactured" type="number" size="4" value="" required="">
            </p>

            <p>
                <strong>Image</strong>
                <input class="car-details" style="min-width: 90%; padding-left: 8px;" name="image" placeholder="Image: url (http:// or https://) or local file including path and file extension" type="text" size="100" required value="">
            </p>

            <p>
                <strong>Description</strong>:<br>
                <textarea class="car-details" style="min-width: 90%; padding-left: 8px;" name="description" placeholder="Description: description of the vehicle" rows="8" cols="100"></textarea>
            </p>

            <input type="submit" name="action" value="Add car">
            <input type="button" value="Cancel" onclick="window.location.href = '<?= BASE_URL ?>/index.php'">
        </form>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}