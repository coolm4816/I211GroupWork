<?php
/**
 * Author: Jawon Winbush
 * Date: 11/17/22
 * File: car_detail.class.php
 * Description:
 */

class CarDetail extends CarIndexView {

    public function display($car, $confirm = "") {
        //display page header
        parent::displayHeader("Display Car Details");

        //retrieve car details by calling get methods
        $id = $car->getId();
        $make = $car->getMake();
        $model = $car->getModel();
        $year = $car->getYear();
        $image = $car->getImage();
        $description = $car->getDescription();


        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
            $image = BASE_URL . '/' . CAR_IMG . $image;
        }
        ?>

        <div id="main-header">Car Details</div>
        <hr>
        <!-- display car details in a table -->
        <table id="detail">
            <tr>
                <td style="width: 150px;">
                    <img src="<?= $image ?>" alt="<?= $model ?>" />
                </td>
                <td style="width: 130px;">
                    <p><strong>Make:</strong></p>
                    <p><strong>Model:</strong></p>
                    <p><strong>Year:</strong></p>
                    <p><strong>Image:</strong></p>
                    <p><strong>Description:</strong></p>
                    <div id="button-group">
                        <input type="button" id="edit-button" value="   Edit   "
                               onclick="window.location.href = '<?= BASE_URL ?>/car/edit/<?= $id ?>'">&nbsp;
                    </div>
                </td>
                <td>
                    <p><?= $make ?></p>
                    <p><?= $model ?></p>
                    <p><?= $year ?></p>
                    <p><?= $image ?></p>
                    <p class="media-description"><?= $description ?></p>
                    <div id="confirm-message"><?= $confirm ?></div>
                </td>
            </tr>
        </table>
        <a href="<?= BASE_URL ?>/car/index">Go to car list</a>

        <?php
        //display page footer
        parent::displayFooter();

    }

//end of display method
}
