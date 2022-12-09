<?php
/**
 * Author: Jawon Winbush
 * Date: 12/7/22
 * File: car_edit.class.php
 * Description: edit individual cars
 */

class CarEdit extends CarIndexView {

    public function display($car) {
        //display page header
        parent::displayHeader("Edit Car");

        //get car categories from a session variable
        if (isset($_SESSION['car_categories'])) {
            $categories = $_SESSION['car_categories'];
        }

        //retrieve car details by calling get methods
        //retrieve car details by calling get methods
        $id = $car->getId();
        $make = $car->getMake();
        $model = $car->getModel();
        $year = $car->getYear();
        $image = $car->getImage();
        $category = $car->getCategory();
        $description = $car->getDescription();
        ?>

        <div id="main-header">Edit Car Details</div>

        <!-- display car details in a form -->
        <form class="new-media"  action='<?= BASE_URL . "/car/update/" . $id ?>' method="post" style=" margin-top: 10px; padding: 10px;">
            <input type="hidden" name="id" value="<?= $id ?>">
            <p>
                <input style="min-width: 90%; padding-left: 8px;" name="category" placeholder="Category of the vehicle" type="text" size="100" value="<?= $category ?>" required autofocus></p>
            <p><strong>Category</strong>:
                <?php
                foreach ($categories as $c_category => $c_id) {
                    $checked = ($category == $c_category ) ? "checked" : "";
                    echo "<input type='radio' name='category' value='$c_id' $checked> $c_category &nbsp;&nbsp;";
                }
                ?>
            </p>
            <p><input class="car-details" style="min-width: 90%; padding-left: 8px;" name="make" placeholder="Make: brand of the vehicle" type="text" size="100" value="<?= $make ?>" required></p>
            <p><input class="car-details" style="min-width: 90%; padding-left: 8px;" name="model" placeholder="Model: specific type of vehicle" type="text" size="40" value="<?= $model ?>" required="">
            <p><input class="car-details" style="min-width: 90%; padding-left: 8px;" name="year" placeholder="Model year: year the vehicle was manufactured" type="number" size="4" value="<?= $year ?>" required=""></p>
            <p><input class="car-details" style="min-width: 90%; padding-left: 8px;" name="image" placeholder="Images: url (http:// or https://) or local file including path and file extension" type="text" size="100" required value="<?= $image ?>"></p>
            <p>
                <strong>Description</strong>:<br>
                <textarea class="car-details" style="min-width: 90%; padding-left: 8px;" name="description" rows="8" cols="100"><?= $description ?></textarea>
            </p>
            <input type="submit" name="action" value="Update car">
            <input type="button" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/car/detail/" . $id ?>"'>
        </form>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}